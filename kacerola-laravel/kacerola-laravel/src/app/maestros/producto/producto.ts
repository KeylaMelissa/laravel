import { CategoriaProducto } from '../categoria-producto/categoria-producto';
import { TablaAuxiliarDetalle } from '../../auxiliares/tabla-auxiliar/models/tabla-auxiliar-detalle';

export class Producto {
  id: number;
  categoria: CategoriaProducto;
  nombre: string;
  descripcion: string;
  foto: string;
  precio: number;
  ind_recomendado: boolean;
  estado: TablaAuxiliarDetalle;
}
