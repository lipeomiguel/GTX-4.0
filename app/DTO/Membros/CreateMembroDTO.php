<?php declare(strict_types=1);

namespace App\DTO\Membros;

use App\Enums\StatusSolicit;

class CreateMembroDTO
{
    public function __construct(
        public string $nome,
        public string $nick,
        public string $plataforma,
        public int    $status_solicit,
        public string $senha,
    ) {
    }

    public static function make(array $request): self
    {
        return new self(
            $request['nome_recrut'],
            $request['nick_recrut'],
            $request['plataforma_recrut'],
            StatusSolicit::STATUS_PENDENTE->value,
            password_hash('12345678', PASSWORD_BCRYPT),
        );
    }
}
