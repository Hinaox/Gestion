<?php


class EmployeConge
{
    private $id;
    private $idEmp;
    private $motif;
    private $dateDebut;
    private $dateFin;
    private $description;
    private $deductibilite;
    private $idPoste;
    private $idSalaire;
    private $dateEmbauche;
    private $nom;
    private $prenom;
    private $nbrJour;

    /**
     * EmployeConge constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdEmp()
    {
        return $this->idEmp;
    }

    /**
     * @param mixed $idEmp
     */
    public function setIdEmp($idEmp)
    {
        $this->idEmp = $idEmp;
    }

    /**
     * @return mixed
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * @param mixed $motif
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param mixed $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDeductibilite()
    {
        return $this->deductibilite;
    }

    /**
     * @param mixed $deductibilite
     */
    public function setDeductibilite($deductibilite)
    {
        $this->deductibilite = $deductibilite;
    }

    /**
     * @return mixed
     */
    public function getIdPoste()
    {
        return $this->idPoste;
    }

    /**
     * @param mixed $idPoste
     */
    public function setIdPoste($idPoste)
    {
        $this->idPoste = $idPoste;
    }

    /**
     * @return mixed
     */
    public function getIdSalaire()
    {
        return $this->idSalaire;
    }

    /**
     * @param mixed $idSalaire
     */
    public function setIdSalaire($idSalaire)
    {
        $this->idSalaire = $idSalaire;
    }

    /**
     * @return mixed
     */
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    /**
     * @param mixed $dateEmbauche
     */
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;
    }


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNbrJour()
    {
        return $this->nbrJour;
    }

    /**
     * @param mixed $nbrJour
     */
    public function setNbrJour($nbrJour)
    {
        $this->nbrJour = $nbrJour;
    }




}