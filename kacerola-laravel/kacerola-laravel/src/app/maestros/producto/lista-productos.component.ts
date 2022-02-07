import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { Producto } from './producto';
import { ProductoService } from './producto.service';
import { CategoriaProductoService } from '../categoria-producto/categoria-producto.service';
import { Options } from 'ng5-slider';
import { CategoriaProducto } from '../categoria-producto/categoria-producto';

@Component({
  selector: 'app-lista-productos',
  templateUrl: './lista-productos.component.html',
  styleUrls: ['./lista-productos.component.scss']
})
export class ListaProductosComponent implements OnInit {

  productos: Producto[];
  productosPopulares: Producto[];
  nombreFiltro: string;
  categoriasFiltro: number[] = [];
  categoriasLista: CategoriaProducto[];
  page: number = 0;
  enlacePaginador:string = 'listado-productos';
  rutaPaginada = '';
  paginador: any;

  minValue: number = 10;
  maxValue: number = 200;
  options: Options = {
    floor: 10,
    ceil: 200
  };

  constructor(private productoService: ProductoService
              ,private categoriaProductoService: CategoriaProductoService
              ,private router: Router
              ,private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    this.categoriaProductoService.getCategorias().subscribe(cat => {
      this.categoriasLista = cat
      this.categoriasLista.forEach(c => this.categoriasFiltro.push(c.id));

      this.activatedRoute.paramMap.subscribe(params => {
        let page:number = +params.get('page');

        if (page === undefined) {
          page = 0;
        }

        this.productoService.getListadoProductos(this.categoriasFiltro, this.minValue, this.maxValue, this.nombreFiltro, page).subscribe(response => {
          this.productos = response.data as Producto[];
          //console.log("ayuda "+ this.productos);
          this.paginador = response;
        });
      });
    });
    this.productoService.getTopPopulares().subscribe(top => this.productosPopulares = top);
  }

  editarCategorias(event) {
    let id: number = parseInt(event.target.value);
    if (event.target.checked) {
      let existe: boolean = false;
      this.categoriasFiltro.forEach(cat => {
        if (id === cat) {
          existe = true;
        }
      });
      if (!existe) {
        this.categoriasFiltro.push(id);
      }
    } else {
      this.categoriasFiltro = this.categoriasFiltro.filter(cat => cat !== id);
    }
  }

  filtrar() {
    //this.router.navigate(['/listado-productos/0']);
    this.productoService.getListadoProductos(this.categoriasFiltro, this.minValue, this.maxValue, this.nombreFiltro, 0).subscribe(response => {
      this.productos = response.content as Producto[];
      this.paginador = response;
    });
  }

  // enterTab(event) {
  //   if (event.keyCode === 13) {
  //     let index = Array.prototype.indexOf.call(event.target);
  //     console.log(index);
  //   }
  // }
}
