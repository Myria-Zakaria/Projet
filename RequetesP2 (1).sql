1.
INSERT into t_news_new(new_id,new_titre,new_texte,new_date,new_etat,cpt_pseudo)
VALUES
(NULL,'Recette de jour !','Le Bulgogi au Boeuf',NOW(),'P','Linda15@hotmail.fr');

2.
SELECT * from t_news_new 
order by new_id
DESC limit 1 ;

3.
SELECT new_titre,cpt_pseudo from t_news_new ; 

4.
SELECT * from t_news_new
JOIN t_profil_pfl USING (cpt_pseudo)
where pfl_role = 'R' and pfl_prenom = 'Mariana' and pfl_nom = 'Pérez';

5.
SELECT * from t_news_new 
order by new_id
DESC limit 5;

6.
UPDATE t_news_new 
set new_titre = 'recettes', new_texte = 'Vous devez essayer cette recette !' 
where new_titre = 'Dakgalbi' and new_texte = 'Le Dakgalbi est l''un des plats préférés des visiteurs.C''est un poulet épicé mariné dans une sauce gochujang (pâte de piment rouge) et cuit avec divers légumes comme l''oignon, les choux, l''oignon de printemps, le gâteau de riz. C''est pour les gourmets qui aiment le poulet épicé.'; 

7.
UPDATE t_news_new
set new_etat = 'P' /* set new_etat = 'C'*/
where new_id = 2 ;

8.
DELETE from t_news_new
where new_id  = 11;

9.
DELETE FROM t_news_new 
WHERE new_date < '2023-08-09';

10.
set @total_resp:= (SELECT count(*) from t_profil_pfl
where pfl_role = 'R');

SELECT @total_resp ; 

set @totalsansActu:= (SELECT count(cpt_pseudo) from t_profil_pfl
                      JOIN t_compte_cpt USING(cpt_pseudo)
                      LEFT JOIN t_news_new USING(cpt_pseudo)
                      where new_texte is null);
                      
SELECT @total_resp / @total_sansActu * 100 as pourcentage ; 

/*OU

 SELECT count(cpt_pseudo)*(SELECT COUNT(*) from t_profil_pfl 
 where pfl_role = 'R' * 100 ,as pourcentage ,'%' 
 from t_profil_pfl where pfl_role = 'R' 
 and cpt_pseudo not in(SELECT cpt_pseudo 
 from t_profil_pfl JOIN t_compte_cpt USING(cpt_pseudo) ));
                                                                                           JOIN t_news_new USING(cpt_pseudo) where cpt_pseudo in (SELECT cpt_pseudo from t_news_new);

*/
11.
INSERT INTO t_compte_cpt(cpt_pseudo,mdp)
VALUES('ryle@hotmail.fr',MD5('1Ry1E'));

INSERT into t_profil_pfl(cpt_pseudo,pfl_nom,pfl_prenom,pfl_validite,pfl_role,pfl_date)
VALUES('ryle@hotmail.fr','Christian','Ryle','A','A',"2020-06-05");

12.
Select cpt_pseudo,mdp,pfl_validite from t_profil_pfl
JOIN t_compte_cpt USING(cpt_pseudo)
where pfl_validite = 'A';
/*
Select * from t_profil_pfl
where pfl_validite = 'A';
*/

13.
Select * from t_profil_pfl
where cpt_pseudo = 'linda15@hotmail.fr';

14.
Select pfl_nom,pfl_prenom,pfl_role from t_profil_pfl
where pfl_nom = 'Plauret' AND pfl_prenom = 'Claria' ;

15.
UPDATE t_profil_pfl
set pfl_nom = 'Laurentitou' , pfl_prenom = 'Lorient' , pfl_validite = 'A'
where cpt_pseudo = 'Laurent@hotmail.fr';

16.
UPDATE t_compte_cpt
set mdp = MD5('LiNDa_15!')
where cpt_pseudo = 'linda15@hotmail.fr';

17.
SELECT * from t_compte_cpt
LEFT JOIN t_profil_pfl USING(cpt_pseudo); 

18.
UPDATE t_profil_pfl
set pfl_validite ='D' /* pour activation set pfl_validite ='A'*/
where cpt_pseudo = 'linda15@hotmail.fr' ; 

19.
INSERT into t_configuration_t(cfg_id,cfg_nom,cfg_description,cfg_mot_du_president,cfg_adresse_postale,cfg_mail,cfg_numero)
VALUES(NULL,'Seoul','Atelier Culianire','Bienvenue sur notre espace dédié aux ateliers culinaires ! ',29200,'seoul@hotmail.fr',0747524028);

20.
SELECT COUNT(*) AS NB FROM t_configuration_t ;

21.
SELECT * from t_configuration_t ;

22.
UPDATE t_configuration_t
set cfg_nom = 'Atelier Cuisine moderne', cfg_mail = 'reach@reachseoul.fr';

23.
Delete from t_configuration_t ; 

24.
INSERT into t_activite_t(pad_id,pad_code,pad_intitule,pad_creation_date,pad_description,pad_fic_image,pad_etat,cpt_pseudo)
VALUES
(NULL,'13DE4VFVVKC127X','Atelier Culinaire,Le Jjapchae',"2023-02-02",'Un plat à découvrir','jjapchae.png','P','Clarani@hotmail.fr');

25.
SELECT * from t_activite_t
where pad_code = '12FR456V23C697X' ; 

26.
SELECT pad_id, pad_intitule from t_activite_t
where pad_id in (SELECT pad_id from t_atelier_t);

27.
SELECT * from t_activite_t
JOIN t_animation_t USING(pad_id)
JOIN t_atelier_t USING(pad_id)
JOIN t_ressources_t USING(atl_id);

28.
SELECT * from t_activite_t
JOIN t_compte_cpt USING(cpt_pseudo)
JOIN t_profil_pfl USING(cpt_pseudo)
where pfl_role = 'A'  AND cpt_pseudo = 'linda15@hotmail.fr';

29.
SELECT * from t_activite_t
where pad_id not in (SELECT pad_id from t_atelier_t);

30.
INSERT into t_animation_t VALUES('Clarine@hotmail.fr',6);

Delete from t_animation_t
where cpt_pseudo like 'sabrina@hotmail.fr';

/*
SET @animateur_OK:=(SELECT cpt_pseudo from t_profil_pfl
            where pfl_role = 'A' and cpt_pseudo = 'Clarani@hotmail.fr');
            

INSERT INTO t_animation_t(pad_id,cpt_pseudo)
SELECT 1,'Clarani@hotmail.fr' FROM DUAL 
where @animateur_OK is not null;
*/

31.
SELECT * from t_activite_t
JOIN t_animation_t USING(pad_id);

32.
SELECT pad_id,count(cpt_pseudo) from t_animation_t
GROUP by cpt_pseudo 
HAVING COUNT(pad_id) > 1;

33.
DELETE from t_ressources_t                             
where atl_id in (select atl_id from t_atelier_t
where pad_id = 10) ;
 
DELETE from t_atelier_t
where pad_id = 10 ;

Delete from t_animation_t
where pad_id = 10;

DELETE from t_activite_t
where pad_id = 10;

34.
DELETE from t_animation_t
where cpt_pseudo = 'Robert@hotmail.fr'  ;

DELETE from t_profil_pfl
where cpt_pseudo = 'Robert@hotmail.fr'  ;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              

DELETE from t_news_new
where cpt_pseudo = 'Robert@hotmail.fr'  ;

DELETE from t_compte_cpt
where cpt_pseudo = 'Robert@hotmail.fr'  ;


35.
UPDATE t_activite_t
set pad_code = '1ZFC45GVN3CY9KX', pad_intitule = 'Atelier Cuisine'
where pad_id = 2 ;

36.
SELECT * from t_activite_t
JOIN t_animation_t using(pad_id)
where pad_id not in (SELECT pad_id from t_animation_t);

37.
INSERT into t_atelier_t(atl_id,atl_intitule,atl_date,atl_texte,atl_etat,pad_id)
VALUES(NULL,'Bibimpap',"2023-03-15",'La recette du jour sera épicée','C',2) ; 

38.
SELECT * from t_ressources_t
join t_atelier_t USING(atl_id)
where atl_id = 3;

39.
SELECT count(*) from t_ressources_t
join t_atelier_t USING(atl_id)
where atl_id = 3;

40.
SELECT count(res_type) as NB_RESSOURCES from t_ressources_t
join t_atelier_t USING(atl_id)
where atl_id = 3;

41.
DELETE from t_ressources_t
where atl_id = 5 ; 

DELETE from t_atelier_t
where atl_id = 5 ; 

42.
INSERT into t_ressources_t(rcs_id,rcs_titre,rcs_description,rcs_chemin_acces,res_type,atl_id) VALUES
(NULL,'Test1','Test2','https://i.pinimg.com/564x/ea/b4/df/eab4dfrvrzvzv7b5615ba8243fb2275b.jpg',2,4);

43.
SELECT * FROM  t_ressources_t
WHERE atl_id = 4;

44.
UPDATE t_ressources_t
set rcs_titre = 'test1', rcs_description = 'test1', rcs_chemin_acces = 'test1'
where rcs_id = 14 ;

45.
DELETE from t_ressources_t
where rcs_id = 11 ;



