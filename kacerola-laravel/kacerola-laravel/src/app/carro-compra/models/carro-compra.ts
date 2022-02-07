import { HorarioAtencion } from '../../maestros/horario-atencion/horario-atencion';
import { Cliente } from '../../maestros/cliente/cliente';
import { TablaAuxiliarDetalle } from '../../auxiliares/tabla-auxiliar/models/tabla-auxiliar-detalle';
import { CarroCompraDetalle } from './carro-compra-detalle';

export class CarroCompra {
  id: number;
  horario: HorarioAtencion;
  cliente: Cliente;
  nombre: string;
  apellido: string;
  telefono: string;
  correo: string;
  direccion: string;
  referencia: string;
  fecha_entrega: Date;
  formaPago: TablaAuxiliarDetalle;
  tipoDocumento: TablaAuxiliarDetalle;
  monto_contraentrega: number;
  montoDelivery: number;
  total: number;
  total_delivery: number;
  detalle: Array<CarroCompraDetalle>=[];
  estadoCarroCompra: TablaAuxiliarDetalle;
  id_usuario_crea: number;
}
