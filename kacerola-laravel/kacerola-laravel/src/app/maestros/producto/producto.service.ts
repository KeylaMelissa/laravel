import { Injectable } from '@angular/core';
import { VariablesGlobales } from '../../common/variables-globales';
import { HttpClient } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { Producto } from './producto';
import { map, catchError } from 'rxjs/operators';
import { Router } from '@angular/router';


@Injectable({
  providedIn: 'root'
})
export class ProductoService {
  private urlEndPoint: string = 'api/producto';

  constructor(private http: HttpClient, private router: Router) { }

  getListadoProductos(idsCategoria: number[],
                      precioDesde: number,
                      precioHasta: number,
                      nombre: string,
                      page: number): Observable<any> {
    let url:string = `${this.urlEndPoint}/listado`;

    if(idsCategoria!= undefined){
       url = url + `&idsCategoria=${idsCategoria}`;
    }

    if(nombre!= undefined && nombre.length >0){
      url = url + `&nombre=${nombre}`;
    }

    if(precioDesde!= undefined){
       url = url + `&precioDesde=${precioDesde}`;
    }

    if(precioHasta!= undefined){
       url = url + `&precioHasta=${precioHasta}`;
    }

    if(page!= undefined){
       url = url + `&page=${page}`;
    }

    if (url.match(/&.*&/)) {
      url = url.replace('&', '?');
    }

    console.log('ss'+ url);
    return this.http.get<Producto[]>(url)
    .pipe(
      map((response: any) => {   
        (response.data as Producto[]).map(cp => {
          cp.foto = 'api/producto/foto/' + cp.foto;
          console.log("ss2 "+cp.nombre);
          return cp;
        });
        return response;
      })
    );
  }

  getTopPopulares(): Observable<any> {
    return this.http.get<Producto[]>(`${this.urlEndPoint}/populares`)
    .pipe(
      map((response: any) => {
        (response as Producto[]).map(cp => {
          cp.foto = 'api/producto/foto/' + cp.foto;
          return cp;
        });
        return response;
        
      })
    );
  }

  getTopRecomendados(): Observable<any> {
    return this.http.get<Producto[]>(`${this.urlEndPoint}/recomendados`)
    .pipe(
      map((response: any) => {
        (response as Producto[]).map(cp => {
          cp.foto = 'api/producto/foto/' + cp.foto;
          console.log("aaaa "+ cp.nombre);
          return cp;
        });

        return response;
      })
    );
  }

  getProducto(id: number): Observable<Producto> {
    return this.http.get<Producto>(`${this.urlEndPoint}/${id}`).pipe(
      map(response => {
        response.foto = 'api/producto/foto/' + response.foto;
        return response;
      })
      ,catchError(e => {
        if (e.status != 401 && e.error.mensaje) {
          this.router.navigate(['/listado-producto/0']);
          console.error(e.error.mensaje);
        }

        return throwError(e);
      })
    );
  }
}
