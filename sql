CREATE VIEW vueconnexionmoniteur
AS SELECT mailmoniteur, mdpmoniteur
FROM moniteur;


Select mdpmoniteur
FROM moniteur
WHERE mailmoniteur = 'elias@gmail.com';

create table demandelecon(
	id_demande int(11) not null auto_increment,
	datelecon date,
	heurelecon time,
	mailclient varchar(50),
	primary key(id_demande)
);


CREATE TABLE  demandesouscription (
  idsouscription int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(20) NOT NULL,
  prenom varchar(20) NOT NULL,
  adresse varchar(100) NOT NULL,
  datedenaissance date NOT NULL,
  telephone varchar(20) NOT NULL,
  mail varchar(50) NOT NULL,
  datedemande date NOT NULL,  
  typedemandeur varchar(10) NOT NULL, 
  typepermis varchar(10) NOT NULL,  
  PRIMARY KEY (idsouscription)
) ENGINE=InnoDB;

insert into demandesouscription (nom, prenom, adresse, datedenaissance, telephone, mail, datedemande, typedemandeur, typepermis) values 
	('langlois', 'arthure','32 rue laba','1989-05-12','0676565434','arthur@gmail.com','2016-03-04','salarier','pro');
create table admin (
	numadmin int not null auto_increment,
	nomadmin varchar(20) not null,
	prenomadmin varchar(20) not null,
	adresseadmin varchar(200) not null,
	numteladmin varchar(10) not null,
	mailadmin varchar(200) not null,
	mdpadmin varchar(200) not null,
	primary key(numadmin)
);


select * from vuplanning
where nomclient in (select nomclient from candidat);

Create View `vueplanning` AS (
	select `c`.`mailclient` AS `mailclient`,`c`.`nomclient` AS `nomclient`,`m`.`nommoniteur` AS `nommoniteur`,`v`.`model` AS `model`,`l`.`datelecon` AS `datelecon`,`l`.`heurelecon` AS `heurelecon`,  `planning`.`etatplanning`
    from (((`planning` join `candidat` `c` on (`c`.`numclient` = `planning`.`numclient`)) join `moniteur` `m` on (`m`.`nummoniteur` = `planning`.`nummoniteur`)) join `vehicule` `v` on (`v`.`numvehicule` = `planning`.`numvehicule`)) join `lecon` `l` on (`l`.`numlecon` = `planning`.`numlecon`));


Delimiter //
create trigger insertDemande
	before insert on lecon 
	for each row 
	begin
	declare id_m int;
	declare date_d date;
	declare heure_d time;
	select nummoniteur, datelecon, heuredebut
	into id_m, date_d, heure_d
	from planning 
	where id_m = new id_m





	delimiter //
	create procedure verifMoniteur
	select nummoniteur 
	from moniteur
	where nummoniteur not in (select distinct nummoniteur from planning)
	union
	select distinct moniteur.nummoniteur 
	from moniteur left join  planning 
	on planning.nummoniteur = moniteur.nummoniteur  
	where (datedebut, heuredebut)
	not in (select datelecon, heurelecon from demandelecon); 
	END //
	delimiter ;


	delimiter //
	create procedure verifMoniteur()
	begin
	select nummoniteur 
	from moniteur
	where nummoniteur not in (select distinct nummoniteur from planning)
	union
	select distinct moniteur.nummoniteur 
	from moniteur left join  planning 
	on planning.nummoniteur = moniteur.nummoniteur  
	where (datelecon, heurelecon)
	not in (select datelecon, heurelecon from demandelecon)
	order by rand() limit 1; 
	END //
	delimiter ;

delimiter //
	create procedure verifMoniteurRand()
	begin
	declare var int;
	call verifMoniteur;
	order by rand() limit 1; 
	END //
	delimiter ;


delimiter //
	create procedure inserNewLecon
		(datelecon date, heurelecon time)
		begin
		insert into lecon values("", datelecon, heurelecon,45);
		end //
delimiter ;



	



delimiter //
CREATE PROCEDURE verifMoniteur ()  
	begin
		select nummoniteur 
		from moniteur
		where nummoniteur not in (select distinct nummoniteur from planning)
		union
		select distinct moniteur.nummoniteur 
		from moniteur left join  planning 
		on planning.nummoniteur = moniteur.nummoniteur  
		where (datelecon, heurelecon)
		not in (select datelecon, heurelecon from demandelecon)
		order by nummoniteur ASC;	
	END //	
delimiter ;


alter table lecon add id_demande int(11) not null, add  foreign key (id_demande) references demandelecon(id_demande);

SELECT mdpadmin 
FROM admin
WHERE mailadmin like "admin@gmail.com";