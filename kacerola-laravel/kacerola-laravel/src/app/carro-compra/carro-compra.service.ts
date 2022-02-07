import { Injectable } from '@angular/core';
import { VariablesGlobales } from '../common/variables-globales';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { Observable, throwError } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { CarroCompra } from './models/carro-compra';

@Injectable({
  providedIn: 'root'
})
export class CarroCompraService {
  private urlEndPoint: string = VariablesGlobales.apiURL + 'api/carro_compra';

  private _carroCompra: CarroCompra;

  constructor(private http: HttpClient, private router: Router) { }

  public get carroCompra(): CarroCompra {
    if (this._carroCompra != null) {
      console.log("If")
      return this._carroCompra;
    } else if (this._carroCompra == null && localStorage.getItem("carro") != null) {
      console.log("ElseIf")
      this._carroCompra = JSON.parse(localStorage.getItem("carro")) as CarroCompra;
      return this._carroCompra;
    } else {
      console.log("Else")
      return new CarroCompra();
    }
  }

  almacenarCarro(car: CarroCompra) {
    // this._carroCompra = new CarroCompra();
    this._carroCompra = car;

    localStorage.clear();
    localStorage.setItem("carro", JSON.stringify(this._carroCompra));
  }

  getCarroCompra(id: number): Observable<CarroCompra> {
    return this.http.get<CarroCompra>(`${this.urlEndPoint}/${id}`).pipe(
      catchError(e => {
        if (e.status != 401 && e.error.mensaje) {
          this.router.navigate(['/']);
          console.error(e.error.mensaje);
        }

        return throwError(e);
      })
    );
  }

  create(carroCompra: CarroCompra): Observable<CarroCompra> {
    return this.http.post(this.urlEndPoint, carroCompra).pipe(
      map((response: any) => response.proveedor as CarroCompra),
      catchError(e => {
        if (e.status==400){
          return throwError(e);
        }

        if (e.error.mensaje) {
          console.error(e.error.mensaje);
        }

        return throwError(e);
      })
    )
  }

  update(carroCompra: CarroCompra): Observable<any> {
    return this.http.put<any>(`${this.urlEndPoint}/${carroCompra.id}`, carroCompra).pipe(
      catchError(e => {
        if (e.status==400){
          return throwError(e);
        }

        if (e.error.mensaje) {
          console.error(e.error.mensaje);
        }

        return throwError(e);
      })
    );
  }
}
