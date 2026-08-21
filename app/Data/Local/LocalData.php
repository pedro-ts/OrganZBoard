<?php

namespace App\Data\Local;

class LocalData
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public ?string $strCep,
        public ?string $strRua,
        public ?int $intNumero,
        public ?string $strComplemento,
        public ?string $strBairro,
        public ?string $strCidade,
        public ?string $strEstado,
        private array $providedFields
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            strCep: $data['strCep'] ?? null,
            strRua: $data['strRua'] ?? null,
            intNumero: $data['intNumero'] ?? null,
            strComplemento: $data['strComplemento'] ?? null,
            strBairro: $data['strBairro'] ?? null,
            strCidade: $data['strCidade'] ?? null,
            strEstado: $data['strEstado'] ?? null,
            providedFields: array_keys($data)
        );
    }

    public function toModelAttributes()
    {
        $attributes = [];

        if ($this->has('strCep')) {
            $attributes['cep'] = $this->strCep;
        }

        if ($this->has('strRua')) {
            $attributes['rua'] = $this->strRua;
        }

        if ($this->has('intNumero')) {
            $attributes['numero'] = $this->intNumero;
        }

        if ($this->has('strComplemento')) {
            $attributes['complemento'] = $this->strComplemento;
        }

        if ($this->has('strBairro')) {
            $attributes['bairro'] = $this->strBairro;
        }

        if ($this->has('strCidade')) {
            $attributes['cidade'] = $this->strCidade;
        }

        if ($this->has('strEstado')) {
            $attributes['estado'] = $this->strEstado;
        }

        return $attributes;
    }

    private function has(string $field): bool
    {
        return in_array(
            $field,
            $this->providedFields,
            true
        );
    }
}
