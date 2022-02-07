import { Component, OnInit } from '@angular/core';
import { BlogService } from './blog.service';
import { CategoriaEntradaBlog } from './models/categoria-entrada-blog';
import { EntradaBlog } from './models/entrada-blog';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {

  categoriasEntradaBlog: CategoriaEntradaBlog[];
  entradasBlog: EntradaBlog[];
  errores: string[];

  idCategoriaFiltro: number = 1;
  page: number = 0;
  enlacePaginador:string = 'blog';
  rutaPaginada = '';
  paginador: any;

  idSelected: number = 1;

  constructor(private blogService: BlogService
              ,private activatedRoute: ActivatedRoute) { }

  ngOnInit(): void {
    this.blogService.getCategorias().subscribe(cat => this.categoriasEntradaBlog = cat);

    this.activatedRoute.paramMap.subscribe(params => {
      let page:number = +params.get('page');

      if (page === undefined) {
        page = 0;
      }

      this.blogService.getEntradasBlog(this.idCategoriaFiltro, page).subscribe(response => {
        this.entradasBlog = response.data as EntradaBlog[];
        this.paginador = response;
      });
    })
  }

  filtrar(id) {
    this.blogService.getEntradasBlog(id, 0).subscribe(response => {
      this.idSelected = id;
      this.entradasBlog = response.data as EntradaBlog[];
      this.paginador = response;
    });
  }
}
