import { TablaAuxiliarDetalle } from '../../auxiliares/tabla-auxiliar/models/tabla-auxiliar-detalle';
import { CategoriaEntradaBlog } from './categoria-entrada-blog';

export class EntradaBlog {
  id: number;
  categoria: CategoriaEntradaBlog;
  titulo: string;
  cuerpo: string;
  foto_lista: string;
  foto_cuerpo: string;
  estadoEntradaBlog: TablaAuxiliarDetalle;
  fecha_crea: Date;
}
