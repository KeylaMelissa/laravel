import { Injectable } from '@angular/core';
import { VariablesGlobales } from '../../common/variables-globales';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { Observable, throwError } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { Empresa } from './empresa';
import { Distrito } from '../../ubigeo/models/distrito';

@Injectable({
  providedIn: 'root'
})
export class EmpresaService {

  private urlEndPoint: string = 'api/empresa';

  public model: Distrito;

  constructor(private http: HttpClient, private router: Router) { }

  getEmpresa(id: number): Observable<Empresa> {
    return this.http.get<Empresa>(`${this.urlEndPoint}/${id}`).pipe(
      map(response => {
        response[0].logo = 'api/empresa/foto/' + response[0].logo;
        console.log('logo '+ response.logo);
        return response[0];
      })
      ,catchError(e => {
        if (e.status != 401 && e.error.mensaje) {
          this.router.navigate(['/']);
          console.error(e.error.mensaje);
        }

        return throwError(e);
      })
    );
  }
}
