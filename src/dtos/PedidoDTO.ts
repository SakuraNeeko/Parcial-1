import { IsString, IsNumber } from 'class-validator';
import { Transform, Type } from 'class-transformer';

export class PedidoDTO {
    @IsString()
    nombre: string = '';

    @IsNumber()
    precio: number = 0;

    @IsNumber()
    stock: number = 0;

    @IsString()
    proveedor: string = '';

    @Transform(value => value.toString()) // Transforma el valor a string
    @IsString()
    id: string = '';

    constructor(data: Partial<PedidoDTO>) {
        Object.assign(this, data);
    }
}
