/* Adding spay, neuter, blood, notes, and "next services due" to Medical Record options */

use paws_db;

DELIMITER $$

DROP PROCEDURE IF EXISTS 08_05_17_deploy $$

CREATE PROCEDURE 08_05_17_deploy()

BEGIN

    /* Spay */
    IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='cat_medical_histories' AND column_name='is_spay')
        THEN
        ALTER TABLE cat_medical_histories ADD COLUMN is_spay TINYINT(1);
    END IF;

    /* Neuter */
    IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='cat_medical_histories' AND column_name='is_neuter')
        THEN
        ALTER TABLE cat_medical_histories ADD COLUMN is_neuter TINYINT(1);
    END IF;

    /* Blood */
    IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='cat_medical_histories' AND column_name='is_blood')
        THEN
        ALTER TABLE cat_medical_histories ADD COLUMN is_blood TINYINT(1);
    END IF;

    /* Notes */
    IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='cat_medical_histories' AND column_name='is_note')
        THEN
        ALTER TABLE cat_medical_histories ADD COLUMN is_note TINYINT(1);
    END IF;

    /* Next Services Due */
    IF NOT EXISTS (SELECT * FROM information_schema.columns WHERE table_schema=DATABASE() and table_name='cat_medical_histories' AND column_name='is_next_service')
        THEN
        ALTER TABLE cat_medical_histories ADD COLUMN is_next_service TINYINT(1);
    END IF;

END $$

CALL 08_05_17_deploy() $$

DROP PROCEDURE IF EXISTS 08_05_17_deploy $$

DELIMITER ;
