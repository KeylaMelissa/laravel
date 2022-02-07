import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { BlogService } from './blog.service';
import { EntradaBlog } from './models/entrada-blog';
import { VariablesGlobales } from '../common/variables-globales';
import { Empresa } from '../maestros/empresa/empresa';
import { EmpresaService } from '../maestros/empresa/empresa.service';

@Component({
  selector: 'app-detalle-blog',
  templateUrl: './detalle-blog.component.html',
  styleUrls: ['./detalle-blog.component.css']
})
export class DetalleBlogComponent implements OnInit {

  entradaBlog: EntradaBlog = new EntradaBlog();
  entradasPopulares: EntradaBlog[];
  errores: string[];

  logo: string = 'api/empresa/foto/';
  empresa: Empresa;

  busqueda: String = '';

  constructor(private blogService: BlogService
              ,private empresaService: EmpresaService
              ,private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    this.activatedRoute.params.subscribe(params => {
      let id = params['id'];

      this.blogService.getEntradaBlog(id).subscribe(blg => this.entradaBlog = blg);

      //this.productoService.getTopRecomendados().subscribe(rec => this.productosRecomendados = rec);
    });

    this.empresaService.getEmpresa(1).subscribe(emp => {
      this.empresa = emp;
      this.logo = this.logo + this.empresa.logo;
    });

    this.blogService.getTopPopulares().subscribe(pop => this.entradasPopulares = pop);
  }

}
