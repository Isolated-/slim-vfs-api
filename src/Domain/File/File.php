<?php
declare(strict_types=1);

namespace App\Domain\File;

use JsonSerializable;

class File implements JsonSerializable
{
    /**
     *  @var int|null
     */
    private $id;

    /**
     *  @var string
     */
    private $filename;

    /**
     *  @var string
     */
    private $path;

    /**
     *  @var string
     */
    private $mime;

    /**
     *  @var bool
     */
    private $is_dir;

    /**
     *  @var int|null $size
     */
    private $size;

    /**
     *  @param int|null $id
     *  @param string $filename
     *  @param string $path
     *  @param string|null $mime
     *  @param bool $is_dir
     *  @param int|null $size
     */
    public function __construct(
        ?int $id,
        string $filename,
        string $path,
        ?string $mime,
        bool $is_dir,
        ?int $size
        )
    {
        $this->id = $id;
        $this->filename = $filename;
        $this->path = $path;
        $this->mime = $mime;
        $this->is_dir = $is_dir;
        $this->size = $size;
    }

    
    /**
     *  @return int|null
     */
    public function getId() {
        return $this->id;
    }

    /**
     *  @return string
     */
    public function getFilename() {
        return $this->filename;
    }

    /**
     *  @return string
     */
    public function getPath() {
        return $this->path;
    }

    /**
     *  @return string|null
     */
    public function getMime() {
        return $this->mime;
    }

    /**
     *  @return bool
     */
    public function getIsDir() {
        return $this->is_dir;
    }

    /**
     *  @return int|null
     */
    public function getSize() {
        return $this->size;
    }


    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'filename' => $this->filename,
            'path' => $this->path,
            'mime' => $this->mime,
            'is_dir' => $this->is_dir,
            'size' => $this->size
        ];
    }
}
