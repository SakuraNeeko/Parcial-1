import { PedidoDTO } from '../dtos/PedidoDTO';
import { Pedido } from '../models/Pedido';
import { PedidoRepository } from '../repositories/PedidoRepository';
import { NotFoundException } from '../exceptions/NotFoundException'; // Importa una excepción personalizada para manejar casos de objeto no encontrado

export class PedidoService {
    private pedidoRepository: PedidoRepository = new PedidoRepository();

    public async agregarPedido(pedidoDTO: PedidoDTO): Promise<Pedido> {
        const nuevoPedido: Pedido = await this.pedidoRepository.createPedido(pedidoDTO);
        return nuevoPedido;
    }

    public async obtenerPedido(id: string): Promise<Pedido | null> {
        const pedido: Pedido | null = await this.pedidoRepository.getPedidoById(id);
        if (!pedido) {
            throw new NotFoundException('Pedido no encontrado'); // Lanza una excepción si el pedido no existe
        }
        return pedido;
    }

    public async actualizarPedido(id: string, pedidoDTO: PedidoDTO): Promise<Pedido | null> {
        const pedidoExistente: Pedido | null = await this.obtenerPedido(id);
        const pedidoActualizado: Pedido | null = await this.pedidoRepository.updatePedido(id, pedidoDTO);
        return pedidoActualizado;
    }

    public async eliminarPedido(id: string): Promise<void> {
        await this.obtenerPedido(id); // Verifica si el pedido existe antes de eliminarlo
        await this.pedidoRepository.deletePedido(id);
    }
}
