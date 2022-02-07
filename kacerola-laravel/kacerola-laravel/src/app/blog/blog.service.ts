import { Injectable } from '@angular/core';
import { VariablesGlobales } from '../common/variables-globales';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { Observable, throwError } from 'rxjs';
import { EntradaBlog } from './models/entrada-blog';
import { map, catchError } from 'rxjs/operators';
import { CategoriaEntradaBlog } from './models/categoria-entrada-blog';

@Injectable({
  providedIn: 'root'
})
export class BlogService {

  private urlEndPoint: string = 'api/entrada_blog';

  constructor(private http: HttpClient, private router: Router) { }

  getCategorias(): Observable<any>{
    return this.http.get<CategoriaEntradaBlog[]>(`${this.urlEndPoint}/categoria/listado`);
  }

  getTopEntradas(): Observable<any>{
    return this.http.get<EntradaBlog[]>(`${this.urlEndPoint}/listado_top`).
    pipe(
      map((response: any) => {
        (response as EntradaBlog[]).map(blg => {
          blg.foto_lista = 'api/entrada_blog/foto/' + blg.foto_lista;
          console.log('entrada '+blg.foto_lista);
          return blg;
        });
        return response;
      })
    );
  }

  getTopPopulares(): Observable<any>{
    return this.http.get<EntradaBlog[]>(`${this.urlEndPoint}/listado_populares`)
    .pipe(
      map((response: any) => {
        (response as EntradaBlog[]).map(blg => {
          blg.cuerpo = blg.cuerpo.substring(0, 100) + '...';
          blg.foto_lista = 'api/entrada_blog/foto/' + blg.foto_lista;
          return blg;
        });
        return response;
      })
    );
  }

  getEntradasBlog(idCategoria: number,
                  page: number): Observable<any> {
    let url:string = `${this.urlEndPoint}/listado`;

    if(idCategoria!= undefined){
       url = url + `&idCategoria=${idCategoria}`;
    }

    if(page!= undefined){
       url = url + `&page=${page}`;
    }

    if (url.match(/&.*&/)) {
      url = url.replace('&', '?');
    }

    return this.http.get<EntradaBlog[]>(url)
    .pipe(
      map((response: any) => {
        (response.data as EntradaBlog[]).map(blg => {
          blg.cuerpo = blg.cuerpo.substring(0, 100) + '...';
          blg.foto_lista =  'api/entrada_blog/foto/' + blg.foto_lista;
          return blg;
        });
        return response;
      })
    );
  }

  getEntradaBlog(id: number): Observable<EntradaBlog> {
    return this.http.get<EntradaBlog>(`${this.urlEndPoint}/${id}`).pipe(
      map(response => {
        response[0].foto_cuerpo = 'api/entrada_blog/foto/' + response[0].foto_cuerpo;
        console.log('foto '+ response.foto_cuerpo);
        return response[0];
      })
      ,catchError(e => {
        if (e.status != 401 && e.error.mensaje) {
          this.router.navigate(['/blog/0']);
          console.error(e.error.mensaje);
        }

        return throwError(e);
      })
    );
  }
}
