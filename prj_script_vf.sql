#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: eleve
#------------------------------------------------------------

CREATE TABLE eleve(
        matricule               int (11) Auto_increment  NOT NULL ,
        nom                     Varchar (25) NOT NULL ,
        prenom                  Varchar (25) NOT NULL ,
        date_naissance          Date NOT NULL ,
        ville_naissance         Varchar (25) NOT NULL ,
        pays_naissance          Varchar (25) NOT NULL ,
        sexe                    Varchar (25) NOT NULL ,
        date_inscription        Date NOT NULL ,
        etablissement_precedent Varchar (25) NOT NULL ,
        num_rue                 Int NOT NULL ,
        nom_rue                 Varchar (25) NOT NULL ,
        code_postal             Int NOT NULL ,
        ville                   Varchar (25) NOT NULL ,
        tel_domicile            Int NOT NULL ,
        tel_mobile              Int NOT NULL ,
        email                   Varchar (25) NOT NULL ,
        nom_medecin             Varchar (25) NOT NULL ,
        prenom_medecin          Varchar (25) NOT NULL ,
        tel_medecin             Int NOT NULL ,
        vaccinations            Longtext NOT NULL ,
        allergies               Longtext NOT NULL ,
        remarques_medicales     Longtext NOT NULL ,
        photo                   Varchar (25) NOT NULL ,
        password                Varchar (25) ,
        nom_promo               Varchar (25) NOT NULL ,
        PRIMARY KEY (matricule )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: annee
#------------------------------------------------------------

CREATE TABLE annee(
        annee_debut Int NOT NULL ,
        annee_fin   Int NOT NULL ,
        PRIMARY KEY (annee_debut )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contact
#------------------------------------------------------------

CREATE TABLE contact(
        nom_contact         Varchar (25) NOT NULL ,
        prenom_contact      Varchar (25) NOT NULL ,
        num_rue_contact     Int NOT NULL ,
        nom_rue_contact     Varchar (25) NOT NULL ,
        code_postal_contact Int NOT NULL ,
        ville_contact       Varchar (25) NOT NULL ,
        tel_contact         Int NOT NULL ,
        email_contact       Varchar (25) NOT NULL ,
        id_contact          int (11) Auto_increment  NOT NULL ,
        matricule           Int NOT NULL ,
        PRIMARY KEY (id_contact )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: document
#------------------------------------------------------------

CREATE TABLE document(
        convoc_parent Longtext NOT NULL ,
        id_document   int (11) Auto_increment  NOT NULL ,
        matricule     Int NOT NULL ,
        PRIMARY KEY (id_document )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Promo
#------------------------------------------------------------

CREATE TABLE Promo(
        nom_promo Varchar (25) NOT NULL ,
        PRIMARY KEY (nom_promo )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: matiere
#------------------------------------------------------------

CREATE TABLE matiere(
        nom_matiere Varchar (25) NOT NULL ,
        nom_ue      Varchar (25) NOT NULL ,
        PRIMARY KEY (nom_matiere )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ue
#------------------------------------------------------------

CREATE TABLE ue(
        nom_ue   Varchar (25) NOT NULL ,
        coeff_ue Double ,
        PRIMARY KEY (nom_ue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: enseignant
#------------------------------------------------------------

CREATE TABLE enseignant(
        nom_enseignant   Varchar (25) NOT NULL ,
        prenom_enseigant Varchar (25) NOT NULL ,
        id_enseignant    int (11) Auto_increment  NOT NULL ,
        email_enseignant Varchar (25) ,
        password         Varchar (25) ,
        PRIMARY KEY (id_enseignant )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: epreuve
#------------------------------------------------------------

CREATE TABLE epreuve(
        nom_epreuves  Varchar (25) NOT NULL ,
        date_epreuve  Date ,
        coeff_epreuve Double ,
        nom_matiere   Varchar (25) NOT NULL ,
        PRIMARY KEY (nom_epreuves )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: administrateur
#------------------------------------------------------------

CREATE TABLE administrateur(
        nom_admin    Varchar (25) ,
        prenom_admin Varchar (25) ,
        id_admin     int (11) Auto_increment  NOT NULL ,
        email_admin  Varchar (25) ,
        password     Varchar (25) ,
        PRIMARY KEY (id_admin )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: present
#------------------------------------------------------------

CREATE TABLE present(
        annee_debut Int NOT NULL ,
        matricule   Int NOT NULL ,
        PRIMARY KEY (annee_debut ,matricule )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etudie
#------------------------------------------------------------

CREATE TABLE etudie(
        matricule Int NOT NULL ,
        nom_ue    Varchar (25) NOT NULL ,
        PRIMARY KEY (matricule ,nom_ue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: passe
#------------------------------------------------------------

CREATE TABLE passe(
        note         Double ,
        matricule    Int NOT NULL ,
        nom_epreuves Varchar (25) NOT NULL ,
        PRIMARY KEY (matricule ,nom_epreuves )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: enseigne
#------------------------------------------------------------

CREATE TABLE enseigne(
        nom_matiere   Varchar (25) NOT NULL ,
        id_enseignant Int NOT NULL ,
        PRIMARY KEY (nom_matiere ,id_enseignant )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: valide
#------------------------------------------------------------

CREATE TABLE valide(
        nom_promo Varchar (25) NOT NULL ,
        nom_ue    Varchar (25) NOT NULL ,
        PRIMARY KEY (nom_promo ,nom_ue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gere
#------------------------------------------------------------

CREATE TABLE gere(
        id_admin  Int NOT NULL ,
        nom_promo Varchar (25) NOT NULL ,
        PRIMARY KEY (id_admin ,nom_promo )
)ENGINE=InnoDB;

ALTER TABLE eleve ADD CONSTRAINT FK_eleve_nom_promo FOREIGN KEY (nom_promo) REFERENCES Promo(nom_promo);
ALTER TABLE contact ADD CONSTRAINT FK_contact_matricule FOREIGN KEY (matricule) REFERENCES eleve(matricule);
ALTER TABLE document ADD CONSTRAINT FK_document_matricule FOREIGN KEY (matricule) REFERENCES eleve(matricule);
ALTER TABLE matiere ADD CONSTRAINT FK_matiere_nom_ue FOREIGN KEY (nom_ue) REFERENCES ue(nom_ue);
ALTER TABLE epreuve ADD CONSTRAINT FK_epreuve_nom_matiere FOREIGN KEY (nom_matiere) REFERENCES matiere(nom_matiere);
ALTER TABLE present ADD CONSTRAINT FK_present_annee_debut FOREIGN KEY (annee_debut) REFERENCES annee(annee_debut);
ALTER TABLE present ADD CONSTRAINT FK_present_matricule FOREIGN KEY (matricule) REFERENCES eleve(matricule);
ALTER TABLE etudie ADD CONSTRAINT FK_etudie_matricule FOREIGN KEY (matricule) REFERENCES eleve(matricule);
ALTER TABLE etudie ADD CONSTRAINT FK_etudie_nom_ue FOREIGN KEY (nom_ue) REFERENCES ue(nom_ue);
ALTER TABLE passe ADD CONSTRAINT FK_passe_matricule FOREIGN KEY (matricule) REFERENCES eleve(matricule);
ALTER TABLE passe ADD CONSTRAINT FK_passe_nom_epreuves FOREIGN KEY (nom_epreuves) REFERENCES epreuve(nom_epreuves);
ALTER TABLE enseigne ADD CONSTRAINT FK_enseigne_nom_matiere FOREIGN KEY (nom_matiere) REFERENCES matiere(nom_matiere);
ALTER TABLE enseigne ADD CONSTRAINT FK_enseigne_id_enseignant FOREIGN KEY (id_enseignant) REFERENCES enseignant(id_enseignant);
ALTER TABLE valide ADD CONSTRAINT FK_valide_nom_promo FOREIGN KEY (nom_promo) REFERENCES Promo(nom_promo);
ALTER TABLE valide ADD CONSTRAINT FK_valide_nom_ue FOREIGN KEY (nom_ue) REFERENCES ue(nom_ue);
ALTER TABLE gere ADD CONSTRAINT FK_gere_id_admin FOREIGN KEY (id_admin) REFERENCES administrateur(id_admin);
ALTER TABLE gere ADD CONSTRAINT FK_gere_nom_promo FOREIGN KEY (nom_promo) REFERENCES Promo(nom_promo);
