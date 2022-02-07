import { Distrito } from '../../ubigeo/models/distrito';

export class Empresa {
  id: number;
  ruc: string;
  nombre: string;
  abreviatura: string;
  direccion: string;
  referencia: string;
  distrito: Distrito;
  correo_contacto: string;
  correo_venta: string;
  telefono: string;
  logo: string;
  url_facebook: string;
  url_twitter: string;
  url_instagram: string;
  url_whatsapp: string;
  id_usuario_crea: string;
}
