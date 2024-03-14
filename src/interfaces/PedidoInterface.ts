
import { Pedido } from "../models/Pedido";

export interface PedidoInterface {
    getAllPedidos(): Promise<Pedido[]>;
    getPedidoById(id: string): Promise<Pedido | null>;
    createPedido(pedido: Pedido): Promise<Pedido>;
    updatePedido(id: string, pedido: Pedido): Promise<Pedido | null>;
    deletePedido(id: string): Promise<boolean>;
}
