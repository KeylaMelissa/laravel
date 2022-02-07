import { BrowserModule } from '@angular/platform-browser';
import { NgModule, LOCALE_ID } from '@angular/core';

import { AppComponent } from './app.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { registerLocaleData } from '@angular/common';
import localeES from '@angular/common/locales/es';
import { RouterModule, Routes } from '@angular/router';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { Ng5SliderModule } from 'ng5-slider';

import { TokenInterceptor } from './usuarios/interceptors/token.interceptor';
import { AuthInterceptor } from './usuarios/interceptors/auth.interceptor';
import { AuthGuard } from './usuarios/guards/auth.guard';
import { RoleGuard } from './usuarios/guards/role.guard';

import { LoginComponent } from './usuarios/login.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { PaginatorComponent } from './paginator/paginator.component';
import { TablaAuxiliarComponent } from './auxiliares/tabla-auxiliar/tabla-auxiliar.component';

import { EmpresaService } from './maestros/empresa/empresa.service';
import { ClienteService } from './maestros/cliente/cliente.service';
import { HorarioAtencionService } from './maestros/horario-atencion/horario-atencion.service';
import { CategoriaProductoService } from './maestros/categoria-producto/categoria-producto.service';
import { ProductoService } from './maestros/producto/producto.service';
import { EnvioMensajeService } from './auxiliares/envio-mensaje/envio-mensaje.service';
import { FotoWebService } from './auxiliares/foto-web/foto-web.service';
import { ParametroService } from './auxiliares/parametro/parametro.service';
import { TablaAuxiliarService } from './auxiliares/tabla-auxiliar/tabla-auxiliar.service';
import { BlogService } from './blog/blog.service';
import { CarroCompraService } from './carro-compra/carro-compra.service';
import { UbigeoService } from './ubigeo/ubigeo.service';

import { NumbersTwoDecimalsDirective } from './common/numbers-two-decimals.directive';
import { OnlyNumbersDirective } from './common/only-numbers.directive';
import { EmpresaComponent } from './maestros/empresa/empresa.component';
import { ClienteComponent } from './maestros/cliente/cliente.component';
import { HorarioAtencionComponent } from './maestros/horario-atencion/horario-atencion.component';
import { CategoriaProductoComponent } from './maestros/categoria-producto/categoria-producto.component';
import { ProductoComponent } from './maestros/producto/producto.component';
import { EnvioMensajeComponent } from './auxiliares/envio-mensaje/envio-mensaje.component';
import { FotoWebComponent } from './auxiliares/foto-web/foto-web.component';
import { ParametroComponent } from './auxiliares/parametro/parametro.component';
import { BlogComponent } from './blog/blog.component';
import { CarroCompraComponent } from './carro-compra/carro-compra.component';
import { UbigeoComponent } from './ubigeo/ubigeo.component';
import { IndexComponent } from './index/index.component';
import { AboutComponent } from './about/about.component';
import { ListaProductosComponent } from './maestros/producto/lista-productos.component';
import { DetalleProductoComponent } from './maestros/producto/detalle-producto.component';
import { DetalleBlogComponent } from './blog/detalle-blog.component';


import { HttpErrorHandler } from './http-error-handler.service';
import { MessageService } from './message.service';

registerLocaleData(localeES, 'es-Pe');

const routes: Routes = [
  {path: '', component: IndexComponent},
  {path: 'about', component: AboutComponent},
  {path: 'envio-mensaje', component: EnvioMensajeComponent},
  {path: 'listado-productos/:page', component: ListaProductosComponent},
  {path: 'detalle-producto/:id', component: DetalleProductoComponent},
  {path: 'compra', component: CarroCompraComponent},
  {path: 'blog/:page', component: BlogComponent},
  {path: 'entrada-blog/:id', component: DetalleBlogComponent},
  {path: 'ingreso', component: LoginComponent}
];

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    HeaderComponent,
    FooterComponent,
    PaginatorComponent,
    NumbersTwoDecimalsDirective,
    OnlyNumbersDirective,
    EmpresaComponent,
    ClienteComponent,
    HorarioAtencionComponent,
    CategoriaProductoComponent,
    ProductoComponent,
    EnvioMensajeComponent,
    FotoWebComponent,
    ParametroComponent,
    TablaAuxiliarComponent,
    BlogComponent,
    CarroCompraComponent,
    UbigeoComponent,
    IndexComponent,
    AboutComponent,
    ListaProductosComponent,
    DetalleProductoComponent,
    DetalleBlogComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    BrowserAnimationsModule,
    Ng5SliderModule,
    RouterModule.forRoot(routes, {
      scrollPositionRestoration: 'top'
    }),
  ],
  providers: [
    EmpresaService,
    ClienteService,
    HorarioAtencionService,
    CategoriaProductoService,
    ProductoService,
    EnvioMensajeService,
    FotoWebService,
    ParametroService,
    TablaAuxiliarService,
    BlogService,
    CarroCompraService,
    UbigeoService,

    MessageService, HttpErrorHandler,

    { provide: LOCALE_ID, useValue: 'es-Pe' },
    { provide: HTTP_INTERCEPTORS, useClass: TokenInterceptor, multi: true },
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true }
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
