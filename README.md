URL : https://monblog.derri.butmmi.o2switch.site/

Nom du blog : Cinégraphie criminelle

Propriétaire : Ines Derri Tp-c

Pour la barre nav j'ai fait des copié coller pour toutes les pages ( vu que c'est normalement la même ).
j'ai fait quelles modifications comme retirer le form de la page où on se trouve actuellement. 
Mais je viens de me rendre compte, que dans la page inscription ou bien login, jai mis une conditions si l'utilisateur est connecté ou bien si il est ladmis. Mais pour accedé a cette page il faut forcément être déconnecté donc c'est inutile. (je les ai pas supprimer on sait jamais)

login de l'admin : root
mot de passe : root 

utilisateur lambda : louna
mot de passe : louna

je n'ai pas fait de fichier connexion. Si vous souhaitez tester en local voici les fichier où il faudra modifier la ligne de connexion à la bas de donnée.

ajouter_commentaire.php  ( ligne 91 )

index.php  ( ligne 44 )

inscription.php  ( ligne 105 )

modifier_billet.php  ( ligne 86 )

nouveau_billet.php  ( ligne 81 )

supprimer_billet.php  ( ligne 13 )

traite_login.php  ( ligne 14 )


Ma base de donnée a été crée en pensant a l'ajout d'une photo de profil . Malheurement rien n'a été développé, seul l'emplacement et la taille de l'image ont été définis.