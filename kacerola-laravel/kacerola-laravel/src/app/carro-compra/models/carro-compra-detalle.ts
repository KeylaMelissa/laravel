import { Producto } from '../../maestros/producto/producto';

export class CarroCompraDetalle {
  id: number;
  nro: number = 0;
  producto: Producto;
  cantidad: number;
  precio_unitario: number;
  precio_total: number;
  id_usuario_crea: number;
}
