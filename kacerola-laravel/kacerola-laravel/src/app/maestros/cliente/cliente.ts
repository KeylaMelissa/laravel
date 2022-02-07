import { TablaAuxiliarDetalle } from "../../auxiliares/tabla-auxiliar/models/tabla-auxiliar-detalle";

export class Cliente {
  id: number;
  nombre: string;
  apellido: string;
  telefono: string;
  correo: string;
  direccion: string;
  referencia: string;
  estado: TablaAuxiliarDetalle;
}
