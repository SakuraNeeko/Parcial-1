import { Request, Response } from 'express';
import { PedidoDTO } from '../dtos/PedidoDTO';
import { PedidoService } from '../services/PedidoService';
import { NotFoundException } from '../exceptions/NotFoundException';

export class PedidoController {
    private pedidoService: PedidoService = new PedidoService();

    public async agregarPedido(req: Request, res: Response): Promise<void> {
        try {
            const pedidoDTO: PedidoDTO = req.body;
            const nuevoPedido = await this.pedidoService.agregarPedido(pedidoDTO);
            res.status(201).json(nuevoPedido);
        } catch (error: any) {
            res.status(500).json({ message: error.message });
        }
    }

    public async obtenerPedido(req: Request, res: Response): Promise<void> {
        try {
            const pedidoId: string = req.params.id;
            const pedido = await this.pedidoService.obtenerPedido(pedidoId);
            if (!pedido) {
                res.status(404).json({ message: 'Pedido no encontrado' });
            } else {
                res.status(200).json(pedido);
            }
        } catch (error: any) {
            res.status(500).json({ message: error.message });
        }
    }

    public async actualizarPedido(req: Request, res: Response): Promise<void> {
        try {
            const pedidoId: string = req.params.id;
            const pedidoDTO: PedidoDTO = req.body;
            const pedidoActualizado = await this.pedidoService.actualizarPedido(pedidoId, pedidoDTO);
            res.status(200).json(pedidoActualizado);
        } catch (error: any) {
            res.status(500).json({ message: error.message });
        }
    }

    public async eliminarPedido(req: Request, res: Response): Promise<void> {
        try {
            const pedidoId: string = req.params.id;
            await this.pedidoService.eliminarPedido(pedidoId);
            res.status(204).end();
        } catch (error: any) {
            res.status(500).json({ message: error.message });
        }
    }
}
