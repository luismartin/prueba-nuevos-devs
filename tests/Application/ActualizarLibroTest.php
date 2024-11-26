<?php

namespace Tests\Application\Libro;

use App\Application\Libro\ActualizarLibro;
use App\Application\Libro\LibroDTO;
use App\Domain\Libro\LibroRepository;
use App\Domain\Libro\Libro;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Test del caso de uso ActualizarLibro
 */
class ActualizarLibroTest extends TestCase
{
    public function testExecute()
    {
        // Crear un mock del repositorio
        /** @var LibroRepository|MockObject $libroRepository */
        $libroRepository = $this->createMock(LibroRepository::class);

        // Configurar el mock para esperar una llamada al método update
        $libroRepository->expects($this->once())
            ->method('update')
            ->with($this->isInstanceOf(Libro::class));

        // Crear una instancia del caso de uso ActualizarLibro
        $actualizarLibro = new ActualizarLibro($libroRepository);

        // Crear un objeto LibroRequest con datos de prueba
        $libroDTO = new LibroDTO(
            'Título actualizado',
            'Autor actualizado',
            '1234567890123',
            'Descripción actualizada',
            1 // ID del libro a actualizar
        );

        // Ejecutar el caso de uso
        $actualizarLibro->execute($libroDTO);
    }
}