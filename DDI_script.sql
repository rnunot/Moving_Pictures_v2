/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     04-12-2012 12:39:05                          */
/*==============================================================*/


drop table if exists FILMES;

drop table if exists LISTA;

drop table if exists LISTA_FILMES;

drop table if exists LISTA_SERIES;

drop table if exists OPINIOES_FILMES;

drop table if exists OPINIOES_SERIES;

drop table if exists SERIES;

drop table if exists USERS;

/*==============================================================*/
/* Table: FILMES                                                */
/*==============================================================*/
create table FILMES
(
   ID_FILME             int not null AUTO_INCREMENT,
   TITULO               varchar(200),
   LINK_IMDB            varchar(1024),
   DURACAO              time,
   REALIZADOR           varchar(150),
   GENERO               varchar(200),
   DATA_CRIACAO         datetime,
   IMAGEM		varchar(300),
   primary key (ID_FILME)
);

/*==============================================================*/
/* Table: LISTA                                                 */
/*==============================================================*/
create table LISTA
(
   ID_LISTA             int not null AUTO_INCREMENT,
   ID_USER		int not null,
   NOME                 varchar(150),
   NOTAS                varchar(500),
   TIPO                 varchar(150),
   DATA_CRIACAO         datetime,
   primary key (ID_LISTA)
);

/*==============================================================*/
/* Table: LISTA_FILMES                                          */
/*==============================================================*/
create table LISTA_FILMES
(
   ID_LISTA             int not null,
   ID_FILME             int not null,
   primary key (ID_LISTA, ID_FILME)
);

/*==============================================================*/
/* Table: LISTA_SERIES                                          */
/*==============================================================*/
create table LISTA_SERIES
(
   ID_LISTA             int not null,
   ID_SERIE             int not null,
   primary key (ID_LISTA, ID_SERIE)
);

/*==============================================================*/
/* Table: OPINIOES_FILMES                                       */
/*==============================================================*/
create table OPINIOES_FILMES
(
   ID_OPINIAO           int not null AUTO_INCREMENT,
   ID_FILME             int,
   ID_USER              int,
   OPINIAO              text,
   DATA_CRIACAO         datetime,
   primary key (ID_OPINIAO)
);

/*==============================================================*/
/* Table: OPINIOES_SERIES                                       */
/*==============================================================*/
create table OPINIOES_SERIES
(
   ID_OPINIAO2          int not null AUTO_INCREMENT,
   ID_USER              int,
   ID_SERIE             int,
   OPINIAO              text,
   DATA_CRIACAO         datetime,
   primary key (ID_OPINIAO2)
);

/*==============================================================*/
/* Table: SERIES                                                */
/*==============================================================*/
create table SERIES
(
   ID_SERIE             int not null AUTO_INCREMENT,
   TITULO               varchar(200),
   NUMERO_EPS           int,
   GENERO               varchar(200),
   LINK_IMDB            varchar(1024),
   CRIADOR              varchar(150),
   DATA_CRIACAO         datetime,
   IMAGEM		varchar(300),
   primary key (ID_SERIE)
);

/*==============================================================*/
/* Table: USERS                                                 */
/*==============================================================*/
create table USERS
(
   ID_USER              int not null AUTO_INCREMENT,
   NOME                 varchar(150),
   DATA_NASC            datetime,
   EMAIL                varchar(250),
   SEXO                 char(1),
   DATA_CRIACAO         datetime,
   LOGIN		varchar(200),
   PASSWORD		varchar(200),
   STRING_ATIVACAO	varchar(200),
   ACTIVO		int,
   primary key (ID_USER)
);

alter table LISTA_FILMES add constraint FK_LISTA_FILMES foreign key (ID_LISTA)
      references LISTA (ID_LISTA) on delete restrict on update restrict;

alter table LISTA_FILMES add constraint FK_LISTA_FILMES2 foreign key (ID_FILME)
      references FILMES (ID_FILME) on delete restrict on update restrict;

alter table LISTA_SERIES add constraint FK_LISTA_SERIES foreign key (ID_LISTA)
      references LISTA (ID_LISTA) on delete restrict on update restrict;

alter table LISTA_SERIES add constraint FK_LISTA_SERIES2 foreign key (ID_SERIE)
      references SERIES (ID_SERIE) on delete restrict on update restrict;

alter table OPINIOES_FILMES add constraint FK_OPINIAO_FILME foreign key (ID_FILME)
      references FILMES (ID_FILME) on delete restrict on update restrict;

alter table OPINIOES_FILMES add constraint FK_OPINIAO_FILME_USER foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

alter table OPINIOES_SERIES add constraint FK_OPINIAO_SERIE foreign key (ID_SERIE)
      references SERIES (ID_SERIE) on delete restrict on update restrict;

alter table OPINIOES_SERIES add constraint FK_OPINIAO_SERIE_USER foreign key (ID_USER)
      references USERS (ID_USER) on delete restrict on update restrict;

