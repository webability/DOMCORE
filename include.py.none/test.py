#!/usr/bin/python
# -*- coding: utf8 -*-

import core
WADEBUG = 1

class A (core.WADebug):
  def getValue(self):
    return "1234"

a = A()
print a.getValue()

print core.ostype
print core.htmlapi

