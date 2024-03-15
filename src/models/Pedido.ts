export interface Pedido {
    id: string;
    fecha: Date;
    total: number;
    estado: string;
    metodoPago: string;
    productos: ProductoPedido[]; 
    nombre: string; 
    precio: number;
    stock: number;
    proveedor: string;
}

interface ProductoPedido {
    id: string;
    nombre: string;
    cantidad: number;
    precioUnitario: number;
}
