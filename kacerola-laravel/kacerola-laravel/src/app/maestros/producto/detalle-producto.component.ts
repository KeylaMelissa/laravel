import { Component, OnInit } from '@angular/core';
import { Producto } from './producto';
import { ProductoService } from './producto.service';
import { ActivatedRoute, Router } from '@angular/router';
import { CarroCompraService } from '../../carro-compra/carro-compra.service';
import { CarroCompraDetalle } from '../../carro-compra/models/carro-compra-detalle';
import { CarroCompra } from '../../carro-compra/models/carro-compra';

@Component({
  selector: 'app-detalle-producto',
  templateUrl: './detalle-producto.component.html',
  styleUrls: ['./detalle-producto.component.css']
})
export class DetalleProductoComponent implements OnInit {

  cantidad: number = 0;
  producto: Producto = new Producto();
  productosRecomendados: Producto[];
  errores: string[];

  constructor(private productoService: ProductoService
              ,private carroCompraService: CarroCompraService
              , private router: Router
              ,private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    this.activatedRoute.params.subscribe(params => {
      let id = params['id'];

      this.productoService.getProducto(id).subscribe(pro => this.producto = pro);

      this.productoService.getTopRecomendados().subscribe(rec => this.productosRecomendados = rec);
    });
  }

  agregar() {
    this.cantidad++;
  }

  disminuir() {
    if (this.cantidad === 0) {
      this.cantidad = 0;
    } else {
      this.cantidad--;
    }
  }

  soloNumeros(event): void {
    if (event.keyCode < 48 || event.keyCode > 57) {
      event.preventDefault();
    }
  }

  agregarCarrito() {
    let carroCompra: CarroCompra = new CarroCompra();
    carroCompra = this.carroCompraService.carroCompra;

    let total: number = carroCompra.detalle.length;

    let detalle: CarroCompraDetalle = new CarroCompraDetalle();
    detalle.nro = total + 1;
    detalle.producto = this.producto;
    detalle.cantidad = this.cantidad;
    detalle.precio_unitario = this.producto.precio;
    detalle.precio_total = detalle.cantidad*detalle.precio_unitario;
    detalle.id_usuario_crea = 1;
    carroCompra.detalle.push(detalle);


    this.carroCompraService.almacenarCarro(carroCompra);

    this.router.navigate(['/listado-productos/0']);
  }
}
