<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;

class MappingLivreDor extends MappingAbstract
{

    private int $mwIdLivreDor;
    private string $mwNameLivreDor;
    private string $mwMailLivreDor;
    private string $mwMessageLivreDor;
    private string $mwDateLivreDor;
    protected int $mwVisibleLivreDor;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    /**
     * Get the value of mwIdLivreDor
     *
     * @return int
     */
    public function getMwIdLivreDor(): int
    {
        return $this->mwIdLivreDor;
    }

    /**
     * Set the value of mwIdLivreDor
     *
     * @param int $mwIdLivreDor
     *
     * @return self
     */
    public function setMwIdLivreDor(int $mwIdLivreDor): self
    {
        $this->mwIdLivreDor = $mwIdLivreDor;

        return $this;
    }

    /**
     * Get the value of mwNameLivreDor
     *
     * @return string
     */
    public function getMwNameLivreDor(): string
    {
        return $this->mwNameLivreDor;
    }

    /**
     * Set the value of mwNameLivreDor
     *
     * @param string $mwNameLivreDor
     *
     * @return self
     */
    public function setMwNameLivreDor(string $mwNameLivreDor): self
    {
        $this->mwNameLivreDor = $mwNameLivreDor;

        return $this;
    }

    /**
     * Get the value of mwMailLivreDor
     *
     * @return string
     */
    public function getMwMailLivreDor(): string
    {
        return $this->mwMailLivreDor;
    }

    /**
     * Set the value of mwMailLivreDor
     *
     * @param string $mwMailLivreDor
     *
     * @return self
     */
    public function setMwMailLivreDor(string $mwMailLivreDor): self
    {
        $this->mwMailLivreDor = $mwMailLivreDor;

        return $this;
    }

    /**
     * Get the value of mwMessageLivreDor
     *
     * @return string
     */
    public function getMwMessageLivreDor(): string
    {
        return $this->mwMessageLivreDor;
    }

    /**
     * Set the value of mwMessageLivreDor
     *
     * @param string $mwMessageLivreDor
     *
     * @return self
     */
    public function setMwMessageLivreDor(string $mwMessageLivreDor): self
    {
        $this->mwMessageLivreDor = $mwMessageLivreDor;

        return $this;
    }

    /**
     * Get the value of mwDateLivreDor
     *
     * @return string
     */
    public function getMwDateLivreDor(): string
    {
        return $this->mwDateLivreDor;
    }

    /**
     * Set the value of mwDateLivreDor
     *
     * @param string $mwDateLivreDor
     *
     * @return self
     */
    public function setMwDateLivreDor(string $mwDateLivreDor): self
    {
        $this->mwDateLivreDor = $mwDateLivreDor;

        return $this;
    }

    /**
     * Get the value of mwVisibleLivreDor
     *
     * @return int
     */
    public function getMwVisibleLivreDor(): int
    {
        return $this->mwVisibleLivreDor;
    }

    /**
     * Set the value of mwVisibleLivreDor
     *
     * @param int $mwVisibleLivreDor
     *
     * @return self
     */
    public function setMwVisibleLivreDor(int $mwVisibleLivreDor): self
    {
        $this->mwVisibleLivreDor = $mwVisibleLivreDor;

        return $this;
    }
}