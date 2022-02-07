import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { VariablesGlobales } from '../common/variables-globales';
import { FotoWebService } from '../auxiliares/foto-web/foto-web.service';
import { EnvioMensaje } from '../auxiliares/envio-mensaje/envio-mensaje';
import { EnvioMensajeService } from '../auxiliares/envio-mensaje/envio-mensaje.service';
import { CategoriaProductoService } from '../maestros/categoria-producto/categoria-producto.service';
import { CategoriaProducto } from '../maestros/categoria-producto/categoria-producto';
import { EntradaBlog } from '../blog/models/entrada-blog';
import { BlogService } from '../blog/blog.service';

@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})
export class IndexComponent implements OnInit {

  banner: string = VariablesGlobales.apiURL + 'api/foto_web/foto/';
  listadoCategoriasProducto: CategoriaProducto[];
  listadoCategoriasProductoTop3: CategoriaProducto[];
  mensaje: EnvioMensaje;
  erroresMensaje: string[];
  listaCatProd: number = 1;
  totalCatProd: number = 0;

  listadoEntradasBlog: EntradaBlog[];

  constructor(private fotoWebService: FotoWebService
              ,private envioMensajeService: EnvioMensajeService
              ,private categoriaProductoService: CategoriaProductoService
              ,private blogService: BlogService
              ,private router: Router) { }

  ngOnInit(): void {
    this.mensaje = new EnvioMensaje();
    this.fotoWebService.getFotoWeb(1).subscribe(fot => this.banner = this.banner + fot.foto);
    this.categoriaProductoService.getCategorias().subscribe(lst => {
      this.listadoCategoriasProducto = lst;
      this.totalCatProd = this.listadoCategoriasProducto.length;
      this.listadoCategoriasProductoTop3 = this.listadoCategoriasProducto.filter(cp => {
        if (cp.nro >= 1 && cp.nro <= 3) {
          return cp;
        }
      });
    });
    this.blogService.getTopEntradas().subscribe(blg => this.listadoEntradasBlog = blg);
  }

  crearMensaje(): void {
    this.envioMensajeService.create(this.mensaje).subscribe(
      msj => {
        this.router.navigate(['/']);
      },
      err => {
        this.erroresMensaje = err.error.errors as string[];
        console.error('Codigo del error: ' + err.status);
        console.error(err.error.errors);
      }
    );
  }

  izquierdaCP() {
    this.listadoCategoriasProductoTop3 = [];
    this.listaCatProd--;
    this.listadoCategoriasProductoTop3 = this.listadoCategoriasProducto.filter(cp => {
      if (cp.nro >= this.listaCatProd && cp.nro <= this.listaCatProd + 2) {
        return cp;
      }
    });
  }

  derechaCP() {
    console.log("llegando");
    this.listadoCategoriasProductoTop3 = [];
    this.listaCatProd++;
    this.listadoCategoriasProductoTop3 = this.listadoCategoriasProducto.filter(cp => {
      if (cp.nro >= this.listaCatProd && cp.nro <= this.listaCatProd + 2) {
        return cp;
      }
    });
  }
}
