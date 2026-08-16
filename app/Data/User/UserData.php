<?php

namespace App\User\Data;

final readonly class UserData
{
    private function __construct(
        public ?string $fullName,
        public ?string $emailAddress,
        public ?string $accessPassword,
        private array $providedFields,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            fullName: $data['full_name'] ?? null,
            emailAddress: $data['email_address'] ?? null,
            accessPassword: $data['access_password'] ?? null,
            providedFields: array_keys($data),
        );
    }

    public function toModelAttributes(): array
    {
        $attributes = [];

        if ($this->has('full_name')) {
            $attributes['name'] = $this->fullName;
        }

        if ($this->has('email_address')) {
            $attributes['email'] = $this->emailAddress;
        }

        if ($this->has('access_password')) {
            $attributes['password'] = $this->accessPassword;
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
