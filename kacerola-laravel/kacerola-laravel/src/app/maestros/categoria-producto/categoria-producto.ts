import { TablaAuxiliarDetalle } from '../../auxiliares/tabla-auxiliar/models/tabla-auxiliar-detalle';

export class CategoriaProducto {
  nro: number = 0;
  id: number;
  nombre: string;
  descripcion: string;
  abreviatura: string;
  foto_portada: string;
  estado: TablaAuxiliarDetalle;
}
