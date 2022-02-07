import { Component, OnInit } from '@angular/core';
import { CarroCompra } from './models/carro-compra';
import { CarroCompraService } from './carro-compra.service';
import { ActivatedRoute } from '@angular/router';
import { HorarioAtencion } from '../maestros/horario-atencion/horario-atencion';
import { HorarioAtencionService } from '../maestros/horario-atencion/horario-atencion.service';
import { VariablesGlobales } from '../common/variables-globales';
import { ParametroService } from '../auxiliares/parametro/parametro.service';
import { CarroCompraDetalle } from './models/carro-compra-detalle';

@Component({
  selector: 'app-carro-compra',
  templateUrl: './carro-compra.component.html',
  styleUrls: ['./carro-compra.component.css']
})
export class CarroCompraComponent implements OnInit {
  rutaFoto: string = VariablesGlobales.apiURL + 'api/producto/foto/';
  carroCompra: CarroCompra = new CarroCompra();
  precioDelivery: number = 0.0;
  horarios: HorarioAtencion[];
  errores: string[];

  constructor(private carroCompraService: CarroCompraService
              ,private horarioAtencionService: HorarioAtencionService
              ,private parametroService: ParametroService
              ,private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    // this.activatedRoute.params.subscribe(params => {
    //   let id = params['id'];
    //
    //   this.carroCompraService.getCarroCompra(id).subscribe(cc => this.carroCompra = cc);
    //
    this.horarioAtencionService.getListado().subscribe(hor => {
      this.horarios = hor;

      this.horarios.forEach(hor => {
        let horaI: Date = new Date(hor.hora_inicio)
        horaI.setMinutes(horaI.getMinutes() + 1);
        hor.hora_inicio =  new Date(horaI);

        let horaF: Date = new Date(hor.hora_fin)
        horaF.setMinutes(horaF.getMinutes() + 1);
        hor.hora_fin =  new Date(horaF);
      })
    });

    this.parametroService.getParametro(2).subscribe(par => {
      this.precioDelivery = parseInt(par.valor);

      this.carroCompra = this.carroCompraService.carroCompra;
      let total: number = 0;
      this.carroCompra.detalle.forEach(det => {
        total += +(det.precio_total);
      });
      this.carroCompra.total = total;
      this.carroCompra.total_delivery = +(this.carroCompra.total) + (this.precioDelivery);
    });
  }

  quitarCarrito(nro: number) {
    this.carroCompra.detalle = this.carroCompra.detalle.filter((deta: CarroCompraDetalle) => deta.nro != nro);
    let numero: number = 1;
    this.carroCompra.detalle.forEach(det => {
      det.nro = numero;
      nro++;
    });

    this.carroCompraService.almacenarCarro(this.carroCompra);
  }
}
