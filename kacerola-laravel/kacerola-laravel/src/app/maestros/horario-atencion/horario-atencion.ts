import { TablaAuxiliarDetalle } from "../../auxiliares/tabla-auxiliar/models/tabla-auxiliar-detalle";

export class HorarioAtencion {
  id: number;
  hora_inicio: Date;
  horaInicioString: string = '';
  hora_fin: Date;
  horaFinString: string = '';
  estado: TablaAuxiliarDetalle;
}
