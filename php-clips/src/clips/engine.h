   /*******************************************************/
   /*      "C" Language Integrated Production System      */
   /*                                                     */
   /*            CLIPS Version 6.40  01/20/16             */
   /*                                                     */
   /*                 ENGINE HEADER FILE                  */
   /*******************************************************/

/*************************************************************/
/* Purpose: Provides functionality primarily associated with */
/*   the run and focus commands.                             */
/*                                                           */
/* Principal Programmer(s):                                  */
/*      Gary D. Riley                                        */
/*                                                           */
/* Contributing Programmer(s):                               */
/*                                                           */
/* Revision History:                                         */
/*                                                           */
/*      6.23: Correction for FalseSymbol/TrueSymbol. DR0859  */
/*                                                           */
/*            Corrected compilation errors for files         */
/*            generated by constructs-to-c. DR0861           */
/*                                                           */
/*      6.24: Removed DYNAMIC_SALIENCE, INCREMENTAL_RESET,   */
/*            and LOGICAL_DEPENDENCIES compilation flags.    */
/*                                                           */
/*            Renamed BOOLEAN macro type to intBool.         */
/*                                                           */
/*            Added access functions to the HaltRules flag.  */
/*                                                           */
/*            Added EnvGetNextFocus, EnvGetFocusChanged, and */
/*            EnvSetFocusChanged functions.                  */
/*                                                           */
/*      6.30: Added additional developer statistics to help  */
/*            analyze join network performance.              */
/*                                                           */
/*            Removed pseudo-facts used in not CEs.          */
/*                                                           */
/*            Added context information for run functions.   */
/*                                                           */
/*            Added before rule firing callback function.    */ 
/*                                                           */
/*            Changed garbage collection algorithm.          */
/*                                                           */
/*            Changed integer type/precision.                */
/*                                                           */
/*            Added EnvHalt function.                        */
/*                                                           */
/*            Used gensprintf instead of sprintf.            */
/*                                                           */
/*            Removed conditional code for unsupported       */
/*            compilers/operating systems (IBM_MCW,          */
/*            MAC_MCW, and IBM_TBC).                         */
/*            Added const qualifiers to remove C++           */
/*            deprecation warnings.                          */
/*                                                           */
/*            Converted API macros to function calls.        */
/*                                                           */
/*      6.40: Incremental reset is always enabled.           */
/*                                                           */
/*************************************************************/

#ifndef _H_engine

#pragma once

#define _H_engine

#include "lgcldpnd.h"
#include "ruledef.h"
#include "network.h"
#include "moduldef.h"
#include "retract.h"

struct focus
  {
   struct defmodule *theModule;
   struct defruleModule *theDefruleModule;
   struct focus *next;
  };
  
#define ENGINE_DATA 18

struct engineData
  { 
   struct defrule *ExecutingRule;
   bool HaltRules;
   struct joinNode *TheLogicalJoin;
   struct partialMatch *TheLogicalBind;
   struct dependency *UnsupportedDataEntities;
   bool alreadyEntered;
   struct callFunctionItem *ListOfRunFunctions;
   struct callFunctionItemWithArg *ListOfBeforeRunFunctions;
   struct focus *CurrentFocus;
   bool FocusChanged;
#if DEBUGGING_FUNCTIONS
   unsigned WatchStatistics;
   unsigned WatchFocus;
#endif
   bool IncrementalResetInProgress;
   bool JoinOperationInProgress;
   struct partialMatch *GlobalLHSBinds;
   struct partialMatch *GlobalRHSBinds;
   struct joinNode *GlobalJoin;
   struct partialMatch *GarbagePartialMatches;
   struct alphaMatch *GarbageAlphaMatches;
   bool AlreadyRunning;
#if DEVELOPER
   long leftToRightComparisons;
   long rightToLeftComparisons;
   long leftToRightSucceeds;
   long rightToLeftSucceeds;
   long leftToRightLoops;
   long rightToLeftLoops;
   long findNextConflictingComparisons;
   long betaHashHTSkips;
   long betaHashListSkips;
   long unneededMarkerCompare;
#endif
  };

#define EngineData(theEnv) ((struct engineData *) GetEnvironmentData(theEnv,ENGINE_DATA))

#define MAX_PATTERNS_CHECKED 64

   long long               EnvRun(void *,long long);
   bool                    EnvAddRunFunction(void *,const char *,
                                                    void (*)(void *),int);
   bool                    EnvAddRunFunctionWithContext(void *,const char *,
                                                               void (*)(void *),int,void *);
   bool                    EnvRemoveRunFunction(void *,const char *);
   bool                    EnvAddBeforeRunFunction(void *,const char *,
                                                    void (*)(void *,void *),int);
   bool                    EnvAddBeforeRunFunctionWithContext(void *,const char *,
                                                               void (*)(void *, void *),int,void *);
   bool                    EnvRemoveBeforeRunFunction(void *,const char *);
   void                    InitializeEngine(void *);
   void                    EnvSetBreak(void *,void *);
   void                    EnvHalt(void *);
   bool                    EnvRemoveBreak(void *,void *);
   void                    RemoveAllBreakpoints(void *);
   void                    EnvShowBreaks(void *,const char *,void *);
   bool                    EnvDefruleHasBreakpoint(void *,void *);
   void                    RunCommand(UDFContext *,CLIPSValue *);
   void                    SetBreakCommand(UDFContext *,CLIPSValue *);
   void                    RemoveBreakCommand(UDFContext *,CLIPSValue *);
   void                    ShowBreaksCommand(UDFContext *,CLIPSValue *);
   void                    HaltCommand(UDFContext *,CLIPSValue *);
   void                    FocusCommand(UDFContext *,CLIPSValue *);
   void                    ClearFocusStackCommand(UDFContext *,CLIPSValue *);
   void                    EnvClearFocusStack(void *);
   void                   *EnvGetNextFocus(void *,void *);
   void                    EnvFocus(void *,void *);
   bool                    EnvGetFocusChanged(void *);
   void                    EnvSetFocusChanged(void *,bool);
   void                    ListFocusStackCommand(UDFContext *,CLIPSValue *);
   void                    EnvListFocusStack(void *,const char *);
   void                    GetFocusStackFunction(UDFContext *,CLIPSValue *);
   void                    EnvGetFocusStack(void *,CLIPSValue *);
   void                    PopFocusFunction(UDFContext *,CLIPSValue *);
   void                    GetFocusFunction(UDFContext *,CLIPSValue *);
   void                   *EnvPopFocus(void *);
   void                   *EnvGetFocus(void *);
   bool                    EnvGetHaltRules(void *);
   void                    EnvSetHaltRules(void *,bool);
   struct activation      *NextActivationToFire(void *);

#endif /* _H_engine */






