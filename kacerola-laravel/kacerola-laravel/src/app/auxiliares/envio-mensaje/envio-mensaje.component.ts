import { Component, OnInit } from '@angular/core';
import { EnvioMensajeService } from './envio-mensaje.service';
import { EnvioMensaje } from './envio-mensaje';
import { Router } from '@angular/router';

@Component({
  selector: 'app-envio-mensaje',
  templateUrl: './envio-mensaje.component.html',
  styleUrls: ['./envio-mensaje.component.css']
})
export class EnvioMensajeComponent implements OnInit {

  mensaje: EnvioMensaje;
  //validado: boolean = false;
  errores: string[];

  constructor(private envioMensajeService: EnvioMensajeService
              ,private router: Router) { }

  ngOnInit(): void {
    this.mensaje = new EnvioMensaje();
  }

  crear(): void {
    this.envioMensajeService.create(this.mensaje).subscribe(
      msj => {
        this.router.navigate(['/']);
      },
      err => {
        this.errores = err.error.errors as string[];
        console.error('Codigo del error: ' + err.status);
        console.error(err.error.errors);
      }
    );
  }
}
