CREATE TABLE tx_joboffer_domain_model_joboffer (

	job_title varchar(255) DEFAULT '' NOT NULL,
	job_description text,
	jobapplies int(11) unsigned DEFAULT '0' NOT NULL

);

CREATE TABLE tx_joboffer_domain_model_jobapply (

	joboffer int(11) unsigned DEFAULT '0' NOT NULL,

	job_title varchar(255) DEFAULT '' NOT NULL,
	salutation int(11) DEFAULT '0' NOT NULL,
	first_name varchar(255) DEFAULT '' NOT NULL,
	last_name varchar(255) DEFAULT '' NOT NULL,
	zip_code varchar(255) DEFAULT '' NOT NULL,
	city varchar(255) DEFAULT '' NOT NULL,
	curriculum_vitae int(11) unsigned NOT NULL default '0',
	image int(11) unsigned NOT NULL default '0'

);
