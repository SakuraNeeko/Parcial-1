import { PedidoDTO } from '../dtos/PedidoDTO';
import { Pedido } from '../models/Pedido';
import { PedidoRepository } from '../repositories/PedidoRepository';
import { NotFoundException } from '../exceptions/NotFoundException';
import { plainToClass } from 'class-transformer';
import { validate } from 'class-validator';

export class PedidoService {
    private pedidoRepository: PedidoRepository = new PedidoRepository();

    public async agregarPedido(pedidoDTO: PedidoDTO): Promise<Pedido> {
        const errors = await validate(pedidoDTO);
        if (errors.length > 0) {
            throw new Error(`Validation failed: ${errors.join(', ')}`);
        }
        const nuevoPedido: Pedido = await this.pedidoRepository.createPedido(pedidoDTO);
        return nuevoPedido;
    }

    public async obtenerPedido(id: string): Promise<Pedido | null> {
        return await this.pedidoRepository.getPedidoById(id);
    }

    public async actualizarPedido(id: string, pedidoDTO: PedidoDTO): Promise<Pedido | null> {
        const pedidoExistente = await this.obtenerPedido(id);
        if (!pedidoExistente) {
            throw new NotFoundException('Pedido no encontrado');
        }
        const errors = await validate(pedidoDTO);
        if (errors.length > 0) {
            throw new Error(`Validation failed: ${errors.join(', ')}`);
        }
        return await this.pedidoRepository.updatePedido(id, pedidoDTO);
    }

    public async eliminarPedido(id: string): Promise<void> {
        const pedidoExistente = await this.obtenerPedido(id);
        if (!pedidoExistente) {
            throw new NotFoundException('Pedido no encontrado');
        }
        await this.pedidoRepository.deletePedido(id);
    }
}
