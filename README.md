Secretictac
===========

Programari per a gestionar les entrades i eixides de documents d'un centre educatiu.

L’aplicació Secretictac consta, en principi, de tres mòduls, que seran o no visibles en funció dels permisos assignats a cada usuari. Aquestos mòduls són:

**1. Mòdul de Registre d’entrades/eixides al Centre:** Este és el mòdul principal de l’aplicació i s’usa per a gestionar els documents d’ENTRADA / EIXIDA en l’organització. Consta de diversos menús:

- Entrades: Gestió dels documents d’Entrada. Possibilitat de seleccionar l’usuari al qual va dirigit el document, si és necessari. Quan un usuari entre en l’aplicació, se li avisarà si té algun document pendent de revisió.

- Eixides: Gestió dels documents d’eixida.

- Llistats/Cerca: Permet obtindre llistats dels registres per pantalla usant diferents filtre per a això, incloent busca en l’assumpte del registre. Aquestos filtres es poden encadenar per a una busca més precisa.

- Imprimir Llibres Registre: Impressió dels llibres d’Entrades i Eixides per anys.

- Organismes /Tipus de Documents: Permet crear i modificar el nom del Organisme, Tipus de documentos,... que usarem en aquest mòdul.

Hi ha que anar en compte en la creació de Organismes, tipus de documents,... des des el formulari d'Entrades/Eixides. Quan es crea un element de aquest tipus amb el botó (+), les dades que en eixe moment estan en el formulari es queden gravades i per tant el registre també es crea. Per tant, com a que s'ha creat el registre, cal completar-ho o be s'ha de tindre en compte aquest fet per a quen es torne a entrar a la aplicació.

**2. Mòdul Compartir Documents**: Mòdul per a compartir documents entre els usuaris de l’aplicació.

- Pujar /compartir documents: Apartat on es gestionen els documents i carpetes que s’han de compartir. Als documents se’ls pot donar el caràcter de públic (els veuran tots els usuaris) o privats (únicament els veurà l’usuari que els ha pujat) . Les carpetes que es creuen sempre seran de caràcter públic, no així els documents.

- Modificar els meus documents:Apartat per a gestionar els documents pujats, canviar-los, moure’ls de carpeta,.... Les carpetes que es creuen, únicament podran ser esborrades per l’administrador de l’aplicació.

**3. Mòdul Administrador de l’aplicación**

- Tipus permisos: Permet crear distints tipus de permisos per a ajustar-se a les necessitats dels usuaris. Hi ha tres permisos creats per defecte, ADMIN, ADMINISTRATIU i SECRETARI.

- Editar permisos: Permet seleccionar els mòduls que poden usar cada un dels usuaris, en funció del tipus de permís assignat. EL permís ADMIN ha de tindre activats tots els mòduls.

- Crear/Editar usuaris: Apartat per a donar d’alta o editar els usuaris de l’aplicació, assignant-li el permís adequat.

- Configuració Inicial: Personalització de les dades del centre com ara logotip, direcció, nom,.... Seran les dades que apareixeran en la capçalera dels documents impresos.

Aquesta és la FASE BETA DE SECRETICTAC. Per a comentaris, suggeriments, correcció d’errades,.... podeu posar-vos en contacte amb mi a través del fòrum d’EDUCATICTAC.

**5. Gestió d'actes**

- Pròximament afegirem un mòdul per a gestionar les actes del centre.

Instal·lació
============

**Requisits:**
- Apache
- Php
- Mysql
- phpmyadmin per a gestionar el mysql

L'únic que hem fet per instalar secretictac:
- Activar el mòdul rewrite:
             sudo a2enmod rewrite
             sudo /etc/init.d/apache2 restart
-Camviar en el php.ini els parametres per a poder pujar arxius dùn tamany adequat.
- Donar a la carpeta www els permisos de escriptura. Després es poden cambiar i asigna-los no més a la carpeta archivos de secretictac.
- Descomprimir el zip en www i accedir a ell amb el navegador.
- Omplir tots els camps (cura amb les majuscules i minuscules). S'ha de saber la contrasenya i usuari de la base de dades (molt important).

Una vegada instal·lat, cal anar a la secció de ADMINISTRADOR i després a la configuració Inicial per posar les dades del secretari i dir-li a la aplicació l'últim registre. Si es vol començar pel primer, deixar el 0.

Visiteu les instruccions detallades del wiki per a més informació https://github.com/Edutictac/install_secretictac/wiki/Instal%C2%B7laci%C3%B3
