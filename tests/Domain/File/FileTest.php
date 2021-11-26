<?php
declare(strict_types=1);

namespace Tests\Domain\File;

use App\Domain\File\File;
use Tests\TestCase;

class FileTest extends TestCase
{
    public function fileProvider()
    {
        return [
            [1, 'myfile.json', '/myfile.json', 'application/json', false, 400],
            [2, 'mydir', '/mydir', null, true, null],
            [3, 'dropbox', '/dropbox', null, true, null],
        ];
    }

    /**
     * @dataProvider fileProvider
     * @param int    $id
     * @param string $filename
     * @param string $path
     * @param string|null $mime
     * @param bool $is_dir
     * @param int|null $size
     */
    public function testGetters(
        int $id, 
        string $filename, 
        string $path, 
        ?string $mime, 
        bool $is_dir, 
        ?int $size)
    {
        $file = new File($id, $filename, $path, $mime, $is_dir, $size);

        $this->assertEquals($id, $file->getId());
        $this->assertEquals($filename, $file->getFilename());
        $this->assertEquals($path, $file->getPath());
        $this->assertEquals($mime, $file->getMime());
        $this->assertEquals($is_dir, $file->getIsDir());
        $this->assertEquals($size, $file->getSize());
    }

    /**
     * @dataProvider fileProvider
     * @param int    $id
     * @param string $filename
     * @param string $path
     * @param string|null $mime
     * @param bool $is_dir
     * @param int|null $size
     */
    public function testJsonSerialize(
        int $id, 
        string $filename, 
        string $path, 
        ?string $mime, 
        bool $is_dir, 
        ?int $size)
    {
        $file = new File($id, $filename, $path, $mime, $is_dir, $size);

        $expectedPayload = json_encode([
            'id' => $id,
            'filename' => $filename,
            'path' => $path,
            'mime' => $mime,
            'is_dir' => $is_dir,
            'size' => $size
        ]);

        $this->assertEquals($expectedPayload, json_encode($file));
    }
}
