import { IsString, IsNumber } from 'class-validator';

export class PedidoDTO {
    @IsString()
    nombre: string = '';

    @IsNumber()
    precio: number = 0;

    @IsNumber()
    stock: number = 0;

    @IsString()
    proveedor: string = '';

    @IsString()
    id: string = ''; // Agregar el campo 'id'

    constructor(data: Partial<PedidoDTO>) {
        Object.assign(this, data);
    }
}
