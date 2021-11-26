<?php
declare(strict_types=1);

namespace App\Domain\File;

interface FileRepository
{
    
    /**
     * @return File[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return File
     * @throws FileNotFoundException
     */
    public function findUserOfId(int $id): File;
}
