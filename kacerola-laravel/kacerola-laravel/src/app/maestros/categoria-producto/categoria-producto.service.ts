import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { VariablesGlobales } from '../../common/variables-globales';
import { CategoriaProducto } from './categoria-producto';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class CategoriaProductoService {
  private urlEndPoint: string = 'api/categoria_producto';

  constructor(private http: HttpClient) { }

  getCategorias(): Observable<any>{
    let i: number = 0;
    return this.http.get<CategoriaProducto[]>(`${this.urlEndPoint}/listado`)
    .pipe(
      map((response: any) => {
        (response as CategoriaProducto[]).map(cp => {
          cp.nro = ++i;
          cp.foto_portada =  'api/categoria_producto/foto/' + cp.foto_portada;

          return cp;
        });

        return response;
      })
    );
  }
}
