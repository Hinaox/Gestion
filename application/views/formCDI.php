
    <div class="container">
        <div class="py-5 text-center">

            <h2>CONTRAT DE TRAVAIL A DUREE INDETERMINEE</h2>
        </div>
        <form method="post" action="<?php echo site_url("ContratCtrl/contrat"); ?>">
            <p>Entre les contractants ci-dessous,</p>
            <h3>EMPLOYEUR :</h3>

            <p>NOM / Dénomination : <input type="text" name="Enom"></p>
            <p>Statut juridique : <input type="text" name="Estatut"></p>
            <p>Adresse exacte  : <input type="text" name="Eadresse"></p>
            <p>N° d’identification statistique : <input type="text" name="Eiden"></p>
            <p>Représenté par M : <input type="text" name="Erep"></p>



            <h3>TRAVAILLEUR :</h3>
            <p >Noms et prénoms : <input type="hidden" value="<?php echo $pers[0]['idPersonne']; ?>" name="idolo"><?php echo $pers[0]['nom']; ?> <?php echo $pers[0]['prenom']; ?></p>
            <p> Né le : <?php echo $pers[0]['dtn']; ?> à Ivato </p>
            <p>De nationalité : Malagasy</p>
            <p>Domicile à Madagascar : <?php echo $pers[0]['adresse']; ?></p>

            <p>A établi le présent contrat régi par
                les dispositions de la loi n°2003-044 du 28 juillet 2004 portant Code du Travail Malgache et ses textes
                subséquents.</p>

            <h3>Art.1 : NATURE ET DUREE DU CONTRAT</h3>

            <p>Le présent contrat est établi pour une durée indéterminée et prend effet à compter du <input type="date" name="dateembauche" placeholder="Date">
            </p>

            <p>Le travailleur accomplira une période d’essai de mois (3) à compter de la date d’effet de ce contrat.
                Pendant
                cette période, le contrat pourra être résilié à tout moment de part et d’autre sans préavis et sans
                indemnité
                autre que celle de la compensatrice de congé et du reliquat de salaire.
                Conformément aux dispositions des articles 41 et 43 du Code du Travail, le présent contrat devra être
                soumis
                au
                visa de l’Inspection du Travail et ne pourra prendre effet qu’à compter de l’obtention de l’autorisation
                d’emploi délivrée par le Ministre chargé du Travail.</p>
            <h3>Art.2 : LIEU D’EMPLOI</h3>
            <p>Le lieu d’emploi est à <input type="text" name="lieu"></p>
            <p>Selon les nécessités de service, le lieu d’emploi peut être transféré en tout autre lieu où la société
                est
                amenée
                à intervenir, à Madagascar comme à l’extérieur, y compris à l’étranger.</p>
            <h3>Art. 3 : FONCTIONS ET QUALIFICATIONS</h3>
            <p>Le travailleur est recruté en qualité de <select name="poste">
                    <?php for ($i = 0; $i < count($poste); $i++) { ?>
                        <option value="<?php echo $poste[$i]['idPoste']; ?>"><?php echo $poste[$i]['nom']; ?></option>
                    <?php } ?>
                </select></p>
            <p>Classification professionnelle : <b>HC</b></p>
            <h3>Art. 4 : REMUNERATION</h3>
            <p>Il percevra la rémunération suivante :</p>
            <p>Salaire (net ou brut) <input type="number" min="0" name="salaire"> Ar /par mois </p>

            <h3>Art.5 : CONGES</h3>
            <p>Le travailleur aura droit, à l’issue de ses douze mois de service effectif, à un congé d’une durée de 2,5
                jours
                calendaires par mois de travail. La date de jouissance des congés sera fixée d’un commun accord avec
                l’Employeur.
                Pendant la durée de ses congés, l’Employé percevra le même salaire qu’en temps normal. Le congé ne
                pourra
                être
                remplacé par une indemnité compensatrice.
                Toutefois, en cas de rupture du contrat, avant que le travailleur ait exercé ses droits au congé, il lui
                sera
                alloué par la Société, en lieu et place du congé, une indemnité compensatrice de congé non pris calculée
                d’après
                la durée du congé auquel l’Employé pouvait prétendre.</p>
            <h3>Art.6 : ACCIDENT DE TRAVAIL ET MALADIES PROFESSIONNELLES</h3>
            <p>En cas d’accident de travail ou de maladie professionnelle, le travailleur bénéficiera, tant pour
                l’indisponibilité que pour l’incapacité permanente qui en résulterait, du régime institué par le Code de
                Prévoyance Sociale et ses textes d’application en vigueur.</p>
            <h3>Art.7 : RETRAITE ET SANTE</h3>
            <p>Il appartient à l’employeur d’affilier le travailleur auprès de la CNaPS.
                L’employeur prend en charge les soins résultant de maladie du travailleur et des membres de sa famille
                conformément au Titre IV Chapitre IV, article 128 et suivants du Code du Travail.</p>
            <input class="btn btn-primary btn-lg btn-block" type="submit" name="" value="Enregistrer">
        </form>
    </div>