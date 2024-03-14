import { Pedido } from "../models/Pedido";
import { PedidoInterface } from "../interfaces/PedidoInterface";
import { PedidoDTO } from "../dtos/PedidoDTO";
import { NotFoundException } from "../exceptions/NotFoundException"; 

export class PedidoRepository implements PedidoInterface {
    private pedidos: Pedido[] = []; // Simulación de almacenamiento de pedidos en memoria
    
    async getAllPedidos(): Promise<Pedido[]> {
        return this.pedidos;
    }

    async getPedidoById(id: string): Promise<Pedido | null> {
        const pedido = this.pedidos.find(pedido => pedido.id === id);
        return pedido ? pedido : null;
    }

    async createPedido(pedidoDTO: PedidoDTO): Promise<Pedido> {
        const nuevoPedido: Pedido = {
            id: pedidoDTO.id, // Asigna el ID proporcionado en el DTO
            nombre: pedidoDTO.nombre,
            precio: pedidoDTO.precio,
            stock: pedidoDTO.stock,
            proveedor: pedidoDTO.proveedor,
            fecha: new Date(),
            total: pedidoDTO.precio * pedidoDTO.stock,
            estado: 'pending',
            metodoPago: 'credit_card',
            productos: [] // Array vacío por ahora
        };
        this.pedidos.push(nuevoPedido); // Agrega el nuevo pedido al array de pedidos
        return nuevoPedido;
    }

    async updatePedido(id: string, pedidoDTO: PedidoDTO): Promise<Pedido | null> {
        const pedidoIndex = this.pedidos.findIndex(pedido => pedido.id === id);
        if (pedidoIndex === -1) {
            return null; // Si no se encuentra el pedido, devuelve null
        }
        const pedidoActualizado = { ...this.pedidos[pedidoIndex], ...pedidoDTO };
        this.pedidos[pedidoIndex] = pedidoActualizado; // Actualiza el pedido en el array
        return pedidoActualizado;
    }

    async deletePedido(id: string): Promise<boolean> {
        const pedidoIndex = this.pedidos.findIndex(pedido => pedido.id === id);
        if (pedidoIndex === -1) {
            return false; // Si no se encuentra el pedido, devuelve false
        }
        this.pedidos.splice(pedidoIndex, 1); // Elimina el pedido del array
        return true;
    }
}
