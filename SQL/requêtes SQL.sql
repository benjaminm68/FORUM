-- Préparer les informations pour la création / la connexion d'un utilisateur


-- Créer un nouvel utilisateur

INSERT INTO user (email, password) VALUES (:email, :password)


-- Supprimer un utilisateur (mon profil ou admin)

DELETE FROM utilisateur
WHERE id_utilisateur = 4


-- Afficher les infos d'un utilisateur

SELECT pseudo, email, rang, date_inscription
FROM utilisateur 
WHERE id_utilisateur = 1


-- Liste des utilisateurs, avec rôle respectifs

SELECT pseudo, rang
FROM utilisateur 


-- Afficher la liste des utilisateurs avec nombre de sujets + ids

SELECT u.pseudo, u.id_utilisateur, COUNT(s.id_sujet)
FROM utilisateur u, sujet s
WHERE u.id_utilisateur = s.utilisateur_id
GROUP BY u.id_utilisateur

-- Afficher la liste des utilisateurs avec nombre de messages + ids

SELECT u.pseudo, u.id_utilisateur, COUNT(m.id_message)
FROM utilisateur u, message m
WHERE u.id_utilisateur = m.id_utilisateur
GROUP BY u.id_utilisateur

-- Compter les réponses pour un sujet

SELECT s.titre, COUNT(m.id_message) AS nbMessage
FROM sujet s, message m
WHERE m.sujet_id = s.id_sujet
GROUP BY m.sujet_id



-- Afficher les sujets d'un utilisateur (ids_sujets)

SELECT s.titre, u.pseudo
FROM sujet s, utilisateur u
WHERE s.id_utilisateur = u.id_utilisateur


-- Afficher les messages d'un utilisateur (ids_messages)

SELECT m.contenu, u.pseudo
FROM message m, utilisateur u
WHERE m.id_utilisateur = u.id_utilisateur


-- Créer un nouveau sujet

INSERT INTO sujet (titre, date_creation, statut, id_categorie, id_utilisateur)
       VALUES (:titre, :date_creation, :statut, :id_categorie, :id_utilisateur)


-- Créer un nouveau message

INSERT INTO message (contenu, date_creation, id_sujet, id_utilisateur)
       VALUES (:contenu, :date_creation, :id_sujet, :id_utilisateur)


-- Éditer un sujet (titre)
UPDATE sujet
        SET titre = :titre,
            -- date_creation = :date_creation,
            -- statut = :statut,
            -- id_categorie = :id_categorie,
            -- id_utilisateur = :id_utilisateur
        WHERE id_sujet = :id_sujet


-- Éditer un message (texte)

UPDATE message
        SET contenu = :contenu,
            -- date_creation = :date_creation,
            -- id_sujet = :id_sujet,
            -- id_utilisateur = :id_utilisateur
        WHERE id_message = :id_message



-- Supprimer un sujet

DELETE FROM `table`
WHERE condition


-- Supprimer un message

DELETE FROM sujet s
WHERE s.id_sujet = 2


-- Afficher tous les sujets, le nombre de réponses, les messages, le premier message

SELECT s.titre, m.date_creation, COUNT(m.id_message), m.contenu
FROM sujet s, message m
WHERE m.id_sujet = s.id_sujet
GROUP BY m.id_message

SELECT s.titre, m.dateCreation, COUNT(m.id_message), m.contenu
FROM sujet s
INNER JOIN message m
ON m.sujet_id = s.id_sujet
GROUP BY m.id_message

-- Afficher tous les sujets (auteur, date, est_resolu, est_verrouille, description, nbReponses)

SELECT  s.titre, COUNT(m.id_message) AS nb_message 
FROM  message m 
INNER  JOIN  sujet s
ON  m.id_sujet = s.id_sujet
GROUP BY m.id_sujet;

SELECT  m.contenu , s.titre
FROM  message m  
INNER JOIN  sujet s 
ON m.id_sujet = s.id_sujet 


-- Afficher un sujet (auteur, date, est_resolu, est_verrouille, description, nbReponses) => View Liste des sujets

SELECT s.titre, s.date_creation, u.pseudo
FROM sujet s, utilisateur u
WHERE  s.id_sujet = u.id_utilisateur
AND s.id_sujet = 1


-- Afficher un sujet => View Page sujet
SELECT u.pseudo, u.avatar, u.rang, s.titre, s.date_creation, COUNT(m.id_message)  
FROM utilisateur u
INNER JOIN sujet s
ON s.id_utilisateur = u.id_utilisateur
INNER JOIN message m
ON m.id_sujet = s.id_sujet
GROUP BY m.id_message

-- Afficher la liste des catégories

SELECT titre
FROM categorie


-- Afficher le nb de sujets dans une catégories

SELECT c.titre, COUNT(s.id_categorie) AS nb_sujet
FROM categorie c, sujet s
WHERE s.id_categorie = c.id_categorie
GROUP BY s.id_categorie


-- Afficher tous les messages d'un sujet => View Page sujet

SELECT s.titre, COUNT(m.id_message) AS nb_msg
FROM sujet s
INNER JOIN message m
ON m.sujet_id = s.id_sujet
GROUP BY s.titre


-- Afficher les 10 derniers membres inscrits


-- Afficher les sujets les plus récents


-- Afficher les 10 sujets les plus populaires (en fonction du nb de messages)

-- Afficher les sujets d'une categorie

SELECT s.titre, c.id_categorie
FROM sujet s, categorie c
WHERE s.categorie_id = c.id_categorie