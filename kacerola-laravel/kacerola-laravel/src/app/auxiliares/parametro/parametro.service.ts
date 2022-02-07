import { Injectable } from '@angular/core';
import { VariablesGlobales } from 'src/app/common/variables-globales';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { Observable } from 'rxjs/internal/Observable';
import { catchError } from 'rxjs/operators';
import { throwError } from 'rxjs';
import { Parametro } from './parametro';

@Injectable({
  providedIn: 'root'
})
export class ParametroService {

  private urlEndPoint: string = VariablesGlobales.apiURL + 'api/parametros';

  constructor(private http: HttpClient, private router: Router) { }

  getParametro(id: number): Observable<Parametro> {
    return this.http.get<Parametro>(`${this.urlEndPoint}/${id}`).pipe(
      catchError(e => {
        if (e.status != 401 && e.error.mensaje) {
          this.router.navigate(['/']);
          console.error(e.error.mensaje);
        }

        return throwError(e);
      })
    );
  }
}
