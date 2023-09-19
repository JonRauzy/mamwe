<?php

namespace model\mappingClass;

use DateTime;
use model\traitClass\DateTrait;
use model\abstractClass\MappingAbstract;
use Exception;

class MappingInfo extends MappingAbstract
{
    use DateTrait;

    private int $mwIdInfo;
    private string $mwNameInfo;
    private ?string $mwAdressInfo;
    private ?string $mwPhoneInfo;
    private ?string $mwMailInfo;
    private ?int $mwPictureMwIdPicture;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }



    // Get de id // 

    public function getMwIdInfo(): int
    {
        return $this->mwIdInfo;
    }

    /**
     * Get the value of mwNameInfo
     */
    public function getMwNameInfo(): string
    {
        return $this->mwNameInfo;
    }


    /**
     * Set the value of mwNameInfo
     */
    public function setMwNameInfo(string $mwNameInfo): self
    {
        $this->mwNameInfo = $mwNameInfo;

        return $this;
    }


    /**
     * Get the value of mwAdressInfo
     */
    public function getMwAdressInfo(): ?string
    {
        return $this->mwAdressInfo;
    }

    /**
     * Set the value of mwAdressInfo
     */
    public function setMwAdressInfo(?string $mwAdressInfo): self
    {
        $this->mwAdressInfo = $mwAdressInfo;

        return $this;
    }


    /**
     * Get the value of mwPhoneInfo
     */
    public function getMwPhoneInfo(): ?string
    {
        return $this->mwPhoneInfo;
    }

    /**
     * Set the value of mwPhoneInfo
     */
    public function setMwPhoneInfo(?string $mwPhoneInfo): self
    {
        $this->mwPhoneInfo = $mwPhoneInfo;

        return $this;
    }
    // SET // 
    
    public function setMwIdInfo(int $mwIdInfo ) : self
    {
        $this->mwIdInfo = $mwIdInfo;
        
        return $this;
    }


        /**
     * Get the value of mwMailInfo
     */
    public function getMwMailInfo(): ?string
    {
        return $this->mwMailInfo;
    }

    /**
     * Set the value of mwMailInfo
     */
    public function setMwMailInfo(?string $mwMailInfo): self
    {
        $this->mwMailInfo = $mwMailInfo;

        return $this;
    }


    // GET de picture // 
    public function getMwPictureMwIdPicture(): ?int
    {
        return $this->mwPictureMwIdPicture;
    }


    // set de picture // 

    public function setMwPictureMwIdPicture(?int $mwPictureMwIdPicture): self
    {
        $this->mwPictureMwIdPicture = $mwPictureMwIdPicture;

        return $this;
    }
   




}